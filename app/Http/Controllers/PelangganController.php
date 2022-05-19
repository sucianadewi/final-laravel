<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Servis;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use App\Models\Tindak_lanjut;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.pelanggan');
    }

    //untuk menampilkan halaman pencarian
    public function cari(Request $request)
    {
        
        return view('kelola_keluhan.cari');
        
        
    }


    //untuk konten hasil pencarian
    public function pencarian(Request $request){
      
        $request->validate([
            'no_nota' => 'required',
            'no_polisi' => 'required',

        ]);
        if ($request->no_nota && $request->no_polisi) {
            
            $result['data'] = Servis::where('no_nota','LIKE','%'.$request->no_nota.'%')
                            ->where('no_polisi','LIKE','%'.$request->no_polisi.'%')
                            ->get()->first();
        }
       
        if ($result['data'] == null) {
            return redirect('pelanggan/search')->with('danger', 'Maaf Data Tidak Ditemukan');
        } else {
        $keluhan= Keluhan::where('id_servis', $result['data']->id_servis)->get();
        $id_keluhan = Keluhan::where('id_servis', $result['data']->id_servis)->get('id_keluhan')->toArray();
        $tanggapan = Tindak_lanjut::where('id_keluhan', $id_keluhan)->get();
        $join = DB::table('keluhan')
                    ->join('servis', 'servis.id_servis', '=', 'keluhan.id_servis')
                    ->join('tindak_lanjut', 'tindak_lanjut.id_keluhan', '=', 'keluhan.id_keluhan')
                    ->where('servis.id_servis', '=', $result['data']->id_servis )
                    ->select('keluhan.*', 'tindak_lanjut.*')
                    ->get();
        // dd($join);
        return view('kelola_keluhan.cari', compact(
            'result', 'keluhan', 'join'
        ));
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        $dtServis = Servis::find($id);
        $tanggal_servis = $dtServis->tgl_servis;
        $seminggu = date('Y-m-d', strtotime('+7 days', strtotime($tanggal_servis)));
        $tanggal_sekarang = Carbon::now()->format('Y-m-d');
        if ($tanggal_sekarang >= $seminggu) {
            return back()->with('danger', "Mohon Maaf Masa Garansi Anda Telah Berakhir. Anda Tidak Dapat Melaporkan Keluhan Setelah Lebih Dari Satu Minggu!");
        }
        
        return view('kelola_keluhan.tambah', compact(
            'dtServis'
        ));
    }

    public function detail($id)
    {
        $keluhan= Keluhan::find($id);
        $join = Keluhan::join('tindak_lanjut', 'keluhan.id_keluhan', '=', 'tindak_lanjut.id_keluhan')
        ->where('tindak_lanjut.id_keluhan', '=', $id)
        ->get();
        // dd($keluhan);
        // $join = DB::table('keluhan')
        //             ->join('servis', 'servis.id_servis', '=', 'keluhan.id_servis')
        //             ->join('tindak_lanjut', 'tindak_lanjut.id_keluhan', '=', 'keluhan.id_keluhan')
        //             ->where('servis.id_servis', '=', $id )
        //             ->select('keluhan.*', 'tindak_lanjut.*')
        //             ->get();
        return view('kelola_keluhan.riwayat', compact(
            'keluhan', 'join'
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
            'id_servis' => 'required',
            'nama' => 'required|max:50',
            'no_tlp' => 'required|max:20',
            'pengaduan' => 'required',
            'bukti' => 'required|image',
        ]);

        $tanggal = Carbon::now()->format('Y-m-d');
        $now = Carbon::now()->format('Ym');
        // $thnBulan = $now->year.$now->month;
        $cek = Keluhan::whereMonth("tgl_keluhan",Carbon::now()->month)->count();
        // $ambiltanggal = Keluhan::all()->last();
        // $tanggalDB = strtotime(Carbon::parse($ambiltanggal->created_at)->format('Y-m-d'))-strtotime($tanggal);
        // $jeda = floor($tanggalDB/60*60*24*30);

        if ($cek == 0) {
            $urut = '000001';
            $no_keluhan = 'KL/'.$now.'/'.$urut;
        } else {
            $ambil = Keluhan::all()->last();
            $urut = (int)substr($ambil->no_keluhan, -6) +1;
            if((int)substr($ambil->no_keluhan, -6) == 999999) {
                $urut = '000001';
            }
            $no_keluhan = 'KL/'.$now.'/'.sprintf("%06s",$urut);
        }

        $model = new Keluhan();
        $model->id_servis = $request->id_servis;
        $model->nama = $request->nama;
        $model->no_tlp = $request->no_tlp;
        $model->pengaduan = $request->pengaduan;
        $model->no_keluhan = $no_keluhan;
        $model->tgl_keluhan = $tanggal;
        $model->bukti = $request->file('bukti')->store('bukti');
        $model->save();

        return redirect('pelanggan/search')->with('success', "Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
