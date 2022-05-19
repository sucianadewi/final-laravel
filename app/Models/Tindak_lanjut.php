<?php

namespace App\Models;

use App\Models\Keluhan;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\KeluhanController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tindak_lanjut extends Model
{
    protected $table = "tindak_lanjut";
    protected $primaryKey = "id_tindak_lanjut";
    protected $guarded = [];

    public function keluhan(){
        return $this->belongsTo(Keluhan::class);
    }
}
