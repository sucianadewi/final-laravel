<?php

namespace App\Models;

use App\Models\Servis;
use App\Models\Tindak_lanjut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluhan extends Model
{
    protected $table = "keluhan";
    protected $primaryKey = "id_keluhan";
    protected $guarded = [];

    public function tindak_lanjut(){
        return $this->hasOne(Tindak_lanjut::class);
    }
    public function servis(){
        return $this->belongsTo(Servis::class);
    }

   
}
