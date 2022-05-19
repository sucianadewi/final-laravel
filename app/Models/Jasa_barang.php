<?php

namespace App\Models;

use App\Models\Servis;
use App\Models\Detail_servis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jasa_barang extends Model
{
    protected $table = "jasa_barang";
    protected $primaryKey = "id_jasa_barang";
    protected $fillable = [
        'id_jasa_barang', 
        'kode', 
        'nama', 
        'harga_satuan'
    ];
    public function detail_servis(){
        return $this->hasMany(Detail_servis::class);
    }
    // public function servis(){
    //     return $this->hasMany(Servis::class);
    // }
}
