<?php

namespace App\Models;

use App\Models\Servis;
use App\Models\Jasa_barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail_servis extends Model
{
    protected $table = "detail_servis";
    protected $primaryKey = "id_detail_servis";
    protected $guarded = [];

    public function servis(){
        return $this->belongsTo(Servis::class);
        
    }
    public function jasa_barang(){
        return $this->belongsTo(Jasa_barang::class);
    }
}
