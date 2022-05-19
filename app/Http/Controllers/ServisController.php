<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Servis;
use App\Models\Jasa_barang;
use Illuminate\Http\Request;
use App\Models\Detail_servis;
use Illuminate\Auth\Events\Validated;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class ServisController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtServis = Servis::all();
        $sorted = $dtServis->sortByDesc('id_servis');
        $sorted->values()->all();
        return view('kelola_servis.index', compact('sorted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jasaBarang = Jasa_barang::all();
        return view('kelola_servis.tambah', compact(
            'jasaBarang'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_servis' => 'required',
            'nama_pemilik' => 'required|max:50',
            'no_tlp' => 'required',
            'no_polisi' => 'required',
            'tipe_motor' => 'required',
            'id_jasa_barang' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',

        ]);

        $data = $request->all();
        foreach($data['id_jasa_barang'] as $item => $value) {
        $jasa = Jasa_barang::find($data['id_jasa_barang'][$item]);
        $stok_lama = $jasa->stok;
        $jumlah = $data['jumlah'][$item];

        if ($stok_lama == 0 || $stok_lama < $jumlah) {
            return back()->with('danger', "Stok jasa dan barang yang diinginkan kurang atau kosong!");
        }
        else {
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now()->format('Ym');
        // $thnBulan = $now->year. $now->month; 
        $cek = Servis::whereMonth("tgl_servis",Carbon::now()->month)->count();
        
        if ($cek == 0 ) {
            $urut = '000001';
            $no_nota = 'SV/'.$now.'/'. $urut;
        } else {
            $ambil = Servis::all()->last();
            $urut = (int)substr($ambil->no_nota, -6) +1;
            if((int)substr($ambil->no_nota, -6) == 999999) {
                $urut = '000001';
            }
            $no_nota = 'SV/'.$now.'/'.sprintf("%06s",$urut);
            
        }
        $servis = new Servis;
        $servis->id_user = Auth::user()->id_user;
        $servis->tgl_servis = $data['tgl_servis'];
        $servis->nama_pemilik = $data['nama_pemilik'];
        $servis->no_tlp = $data['no_tlp'];
        $servis->no_polisi = $data['no_polisi'];
        $servis->no_nota = $no_nota;
        $servis->tipe_motor = $data['tipe_motor'];
        $servis->mekanik = Auth::user()->nama;
        $servis->keterangan = $data['keterangan'];
        $servis->save();

            $total=0;
            foreach($data['id_jasa_barang'] as $item => $value) {
                
                $jasa_barang = Jasa_barang::find($data['id_jasa_barang'][$item]);
                $stok_lama = $jasa_barang->stok;
                
                $nama = $jasa_barang->nama;
                $harga = $jasa_barang->harga;
                $jumlah = $data['jumlah'][$item];
                $subTotal = $harga * $jumlah;
                $total+=$subTotal;
                $stok_baru = $stok_lama - $jumlah;
                $detail_servis = new Detail_servis;
                $detail_servis->id_servis = $servis->id_servis;
                $detail_servis->id_jasa_barang = $data['id_jasa_barang'][$item];
                $detail_servis->jumlah = $data['jumlah'][$item];
                $detail_servis->nama = $nama;
                $detail_servis->harga = $harga;
                $detail_servis->sub_total = $subTotal;
                $detail_servis->save();
            }
            // if($stok_lama < $jumlah) {
            //     return back()->with('danger', "Stok jasa/barang yang diinginkan kosong!");
            // }
            // else {
            //     DB::table('jasa_barang')->where('id_jasa_barang', $jasa_barang->id_jasa_barang)->update(['stok' => $stok_baru]);
            // }
        
            DB::table('servis')->where('id_servis', $servis->id_servis)->update(['total_biaya' => $total]);
            DB::table('jasa_barang')->where('id_jasa_barang', $jasa_barang->id_jasa_barang)->update(['stok' => $stok_baru]);

        return redirect('servis')->with('success', "Data Berhasil Ditambahkan");
        }
        
        
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $dataServis = Servis::find($id);
        
        // $dataDetail = DB::table('servis')->join('detail_servis', 'servis.id_servis', '=', 'detail_servis.id_servis')->get();
        $dataDetail = Servis::join('detail_servis', 'servis.id_servis', '=', 'detail_servis.id_servis')
                    ->where('detail_servis.id_servis', '=', $id)
                    ->get();
        return view('kelola_servis.detail', compact(
            'dataServis', 'dataDetail'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dtServis = Servis::find($id);
        $jasaBarang = Jasa_barang::all();
        // $dtDetail = Servis::join('detail_servis', 'servis.id_servis', '=', 'detail_servis.id_servis')
        //             ->where('detail_servis.id_servis', '=', $id)
        //             ->get('detail_servis.*');
        $detail = Detail_servis::where('id_servis', '=', $id)->get();
        
        return view('kelola_servis.ubah', compact(
            'dtServis', 'detail', 'jasaBarang'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'tgl_servis' => 'required',
            'nama_pemilik' => 'required|max:50',
            'no_tlp' => 'required',
            'no_polisi' => 'required',
            'tipe_motor' => 'required',
            'id_jasa_barang' => 'required|not_in:0',
            'jumlah' => 'required',
            'keterangan' => 'required',

        ]);

        $data = $request->all();
        foreach($data['id_jasa_barang'] as $item => $value) {
            $jasa = Jasa_barang::find($data['id_jasa_barang'][$item]);
            $stok_lama = $jasa->stok;
            $jumlah = $data['jumlah'][$item];
        if ($stok_lama == 0 || $stok_lama < $jumlah) {
            return back()->with('danger', "Stok jasa dan barang yang diinginkan kurang atau kosong!");
        }
        else {
        $servis = Servis::find($id);
        $servis->id_user = Auth::user()->id_user;
        $servis->tgl_servis = $data['tgl_servis'];
        $servis->nama_pemilik = $data['nama_pemilik'];
        $servis->no_tlp = $data['no_tlp'];
        $servis->no_polisi = $data['no_polisi'];
        $servis->tipe_motor = $data['tipe_motor'];
        $servis->mekanik = Auth::user()->nama;
        $servis->keterangan = $data['keterangan'];
        $servis->save();
        
        $id_detail_servis = $request->id_detail_servis;
        $count = count($data['id_jasa_barang']);
        
        $total=0;
            
            for($i = 0; $i < $count; $i++) {
                $jasa_barang = Jasa_barang::find($data['id_jasa_barang'][$i]);
                $stok_lama = $jasa_barang->stok;
                $detail = Detail_servis::find($id_detail_servis[$i]);
                $nama = $jasa_barang->nama;
                $harga = $jasa_barang->harga;
                $jumlah = $data['jumlah'][$i];
                $subTotal = $harga * $jumlah;
                $total+=$subTotal;
                $stok_baru = $stok_lama - $jumlah;
                    $data_detail = [
                        'id_jasa_barang' => $data['id_jasa_barang'][$i],
                        'jumlah' => $data['jumlah'][$i],
                        'nama' => $nama,
                        'harga' => $harga,
                        'sub_total' => $subTotal
                    ];
                $detail->update($data_detail);
            }
            
            DB::table('servis')->where('id_servis', $id)->update(['total_biaya' => $total]);
            DB::table('jasa_barang')->where('id_jasa_barang', $jasa_barang->id_jasa_barang)->update(['stok' => $stok_baru]);


        return redirect('servis')->with('success', "Data Berhasil Diubah");
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetakForm() {
        return view('cetak.cetak_servis');
    }

    public function cari(Request $request) {
        $request->validate([
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',

        ]);
        
        $result = Servis::whereBetween('tgl_servis',[$request->tgl_awal, $request->tgl_akhir])
                ->get()->sortByDesc('id_servis');
        
        return view('cetak.cetak_servis', compact(
            'result'
        ));
        
    }

    public function cetakPdf($tgl_awal, $tgl_akhir) {
        
        $cetakPertanggal = Servis::whereBetween('tgl_servis',[$tgl_awal,$tgl_akhir])->get();
        $tanggal = Carbon::now()->format('dmY');
        $nama_cetak = $tanggal.'_laporan_servis.pdf';
        $data =[
            'title' => 'Laporan Servis',
            'date' => date('d F Y')
        ];
        $pdf = PDF::loadView('cetak.cetak_servis_pdf', compact('cetakPertanggal', 'data', 'tgl_awal', 'tgl_akhir'));
        return $pdf->setPaper('a4', 'landscape')->download($nama_cetak);
    }

    // public function cetakPertanggal($tgl_awal, $tgl_akhir) {
    //     // dd("tgl".$tgl_awal."tgl".$tgl_akhir);
    //     $cetakPertanggal = Servis::whereBetween('tgl_servis',[$tgl_awal,$tgl_akhir])->get();
    //     return view('cetak.cetak_servis_pertanggal', compact('cetakPertanggal', 'tgl_awal', 'tgl_akhir'));
    // }
}
