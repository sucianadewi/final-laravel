<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('kelola_profile.setting');
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

        return back()->with('success', "Data Berhasil Diubah");


    }

    public function editPassword(Request $request, $id)
    {
        $dtUser = User::find($id);
        $request->validate([
            'password' => 'required|string|min:5|confirmed',

        ]);

        
        User::where('id_user', $dtUser->id_user)
            ->update([
                'password' => Hash::make($request->password)
            ]);
        return back()->with('success', "Password Berhasil Diubah");
        
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
