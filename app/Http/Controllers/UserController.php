<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Enum_;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
        $dtUser = User::all();
        $sorted = $dtUser->sortByDesc('id_user');
        $sorted->values()->all();
        return view('kelola_user.index', compact('sorted'));
    }

    public function status($id) 
    {
        $data = User::find($id);
        // $data = User::where('id_user', $id);

        $status_sekarang = $data->status;

        if($status_sekarang == 'Aktif'){
            $data->status = 'Non-Aktif';
            $data->save();
        }
        else {
            $data->status = 'Aktif';
            $data->save();
        }
        return redirect('pengguna');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = ['Admin','Petugas'];
        return view('kelola_user.tambah', compact(
            'role'
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
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'no_tlp' => 'required|max:20',
            'role' => 'required',
            'email' => 'required|email:dns|unique:user',
            'password' => 'required|string|min:5',
        ]) ;

        $dtUser = new User();
        $dtUser->nama = $request->nama;
        $dtUser->email = $request->email;
        $dtUser->no_tlp = $request->no_tlp;
        $dtUser->alamat = $request->alamat;
        $dtUser->role = $request->role;
        $dtUser->password = Hash::make($request->password);
        $dtUser->status = 'Aktif';
        $dtUser->save();
        return redirect('pengguna')->with('success','Pengguna Berhasil Ditambahkan!');


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
        $model = User::find($id);
        $role = ['Admin','Petugas'];
        
        return view('kelola_user.ubah', compact(
            'model', 'role'
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
        
        $model = User::find($id);
        $rules = [
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'no_tlp' => 'required|max:20',
            'role' => 'required',
            'foto' => 'image|file',

        ];

        if($request->email != $model->email) {

            $rules['email'] = 'required|email:dns|unique:user';

        }

        if($request->password != null) {
            $rules['password'] = 'string|min:5';
        }
        

        $validatedData = $request->validate($rules);
        
        if($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('profile');
        }
        if($request->password == null) {
            $validatedData['password'] = $request->password_lama;
        } else {
            $validatedData['password'] = Hash::make($request->password);
        }

        User::where('id_user', $model->id_user)
                ->update($validatedData);
        return redirect('pengguna')->with('success','Data Berhasil Diubah!');

        // if($request->file('foto_profil')) {
        //     $validatedData['foto_profil'] = $request->file('foto_profil')->store('foto-profile');
        // }
    }

    // public function editPassword(Request $request, $id)
    // {
    //     $dtUser = User::find($id);
    //     $request->validate([
    //         'password' => 'required|string|min:5|confirmed',

    //     ]);

        
    //     User::where('id_user', $dtUser->id_user)
    //         ->update([
    //             'password' => Hash::make($request->password)
    //         ]);
    //     return redirect('pengguna')->with('success', "Password Berhasil Diubah");
        
    // }
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
