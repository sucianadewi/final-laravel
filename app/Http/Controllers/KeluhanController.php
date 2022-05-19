<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Keluhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use PDF;

class KeluhanController extends Controller
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
        $dtKeluhan = Keluhan::all();
        $sorted = $dtKeluhan->sortByDesc('id_keluhan');
        $sorted->values()->all();
        return view('kelola_keluhan.index', compact('sorted'));
    }

    public function status($id) 
    {
        $data = Keluhan::find($id);
        // $data = User::where('id_user', $id);

        $status_sekarang = $data->status;

        if($status_sekarang == 'Open'){
            $data->status = 'Close';
            $data->save();
        }
        else {
            $data->status = 'Open';
            $data->save();
        }
        return redirect('keluhan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataKeluhan = Keluhan::find($id);
        return view('kelola_keluhan.detail', compact('dataKeluhan'));
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
    public function cetakForm() {
        return view('cetak.cetak_keluhan');
    }

    public function cari(Request $request) {
        $request->validate([
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',

        ]);
        $result = Keluhan::whereBetween('tgl_keluhan',[$request->tgl_awal, $request->tgl_akhir])
                ->get()->sortByDesc('id_keluhan');
        
        return view('cetak.cetak_keluhan', compact(
            'result'
        ));
    }

    public function cetakPdf($tgl_awal, $tgl_akhir) {
        
        $cetakPertanggal = Keluhan::whereBetween('tgl_keluhan',[$tgl_awal,$tgl_akhir])->get();
        $tanggal = Carbon::now()->format('dmY');
        $nama_cetak = $tanggal.'_laporan_keluhan.pdf';
        $data =[
            'title' => 'Laporan Keluhan',
            'date' => date('d F Y')
        ];
        $pdf = PDF::loadView('cetak.cetak_keluhan_pdf', compact('cetakPertanggal', 'data', 'tgl_awal', 'tgl_akhir'));
        return $pdf->setPaper('a4', 'landscape')->download($nama_cetak);
    }
}
