<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Kadek Rini Arini',
            'email' => 'rini@gmail.com',
            'no_tlp' => '08128375661',
            'alamat' => 'Jalan Tukad Petanu No.15',
            'password' => Hash::make('12345'),
            'status' => 'Aktif',
            'role' => 'Admin',
        ]);

        User::create([
            'nama' => 'I Gusti Agung Bayu',
            'email' => 'bayu@gmail.com',
            'no_tlp' => '082304832819',
            'alamat' => 'Jalan Hayam Wuruk',
            'password' => Hash::make('12345'),
            'status' => 'Aktif',
            'role' => 'Petugas',
        ]);
    }
}
