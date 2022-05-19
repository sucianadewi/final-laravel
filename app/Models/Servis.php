<?php

namespace App\Models;

use App\Models\User;
use App\Models\Keluhan;
use App\Models\Detail_servis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servis extends Model
{
    protected $table = "servis";
    protected $primaryKey = "id_servis";
    protected $guarded = [];

    public function keluhan(){
        return $this->hasMany(Keluhan::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail_servis(){
        return $this->hasMany(Detail_servis::class);
    }
}
