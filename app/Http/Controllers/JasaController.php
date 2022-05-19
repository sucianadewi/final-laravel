<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Keluhan;
use App\Models\Jasa_barang;
use Illuminate\Http\Request;
use App\Http\Requests\JasaRequest;
use Illuminate\Routing\Controller;

class JasaController extends Controller
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
        $dtJasaBarang = Jasa_barang::all();
        $sorted = $dtJasaBarang->sortByDesc('id_jasa_barang');
        $sorted->values()->all();
        return view('kelola_jasa_barang.index', compact('sorted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jasa_barang();
        return view('kelola_jasa_barang.tambah', compact(
            'model'
        ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JasaRequest $request)
    {
        $request->validate([
            
            'nama' => 'required|max:40',
            'harga' => 'required',
        ]);
        
        
        $cek = Jasa_barang::count();
        
        if ($cek == 0) {
            $urut = '0001';
            $kode = 'BRG-'.$urut;
        } else {
            $ambil = Jasa_barang::all()->last();
            $urut = (int)substr($ambil->kode, -4) +1;
            $kode = 'BRG-'.sprintf("%04s",$urut);
        }
        $model = new Jasa_barang();
        $model->kode = $kode;
        $model->nama = $request->nama;
        $model->harga = $request->harga;
        $model->stok = $request->stok;
        $model->save();

        return redirect('jasa')->with('success', "Data Berhasil Ditambahkan");
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
        $model = Jasa_barang::find($id);
        return view('kelola_jasa_barang.ubah', compact(
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
    public function update(JasaRequest $request, $id)
    {
        $model = Jasa_barang::find($id);
        $model->nama = $request->nama;
        $model->harga = $request->harga;
        $model->stok = $request->stok;
        $model->save();

        return redirect('jasa')->with('success', "Data Berhasil Diubah");
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
