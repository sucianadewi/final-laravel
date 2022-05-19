<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use App\Models\Tindak_lanjut;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TindakLanjutController extends Controller
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
        $status = ['Open','Close'];
        $db = Tindak_lanjut::join('keluhan', 'keluhan.id_keluhan', '=', 'tindak_lanjut.id_keluhan')->get(['keluhan.id_keluhan','keluhan.no_keluhan','tindak_lanjut.*']);
        $sorted = $db->sortByDesc('id_tindak_lanjut');
        $sorted->values()->all();
        
        return view('tindak_lanjut.index', compact('sorted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //    //
    // }

    // public function create($id)
    // {
    //     $idKeluhan = Keluhan::find($id);
        
        
        
    //     return view('tindak_lanjut.tambah', compact(
    //         'idKeluhan', 
    //     ));
        
    // }

    public function buat($id)
    {
        $idKeluhan = Keluhan::find($id);
        return view('tindak_lanjut.tambah', compact(
            'idKeluhan', 
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
            'id_keluhan' => 'required',
            'tgl_penanganan' => 'required',
            'keterangan' => 'required',
        ]);
        // if (Tindak_lanjut::where('id_keluhan', $request->id_keluhan)->exists()) {
        //     return redirect('keluhan')->with('danger', "Maaf, Anda Hanya Dapat Menambahkan Tanggapan Sekali Saja!");
        // } else {
            $data = $request->all();
            $tindak_lanjut = new Tindak_lanjut();
            $tindak_lanjut->id_keluhan = $data['id_keluhan'];
            $tindak_lanjut->tgl_penanganan = $data['tgl_penanganan'];
            $tindak_lanjut->keterangan = $data['keterangan'];
            $tindak_lanjut->save();

            return redirect('keluhan')->with('success', "Data Berhasil Ditambahkan");
        // }
        
        

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
        $model = Tindak_lanjut::find($id);
        return view('tindak_lanjut.ubah', compact(
            'model'
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
            'tgl_penanganan' => 'required',
            'keterangan' => 'required',
        ]);

        $model = Tindak_lanjut::find($id);
        $model->tgl_penanganan = $request->tgl_penanganan;
        $model->keterangan = $request->keterangan;
        $model->save();

        return redirect('tindak_lanjut')->with('success', "Data Berhasil Diubah");
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
