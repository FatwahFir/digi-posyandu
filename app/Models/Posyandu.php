<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posyandu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function desa(){
        return $this->belongsTo(Desa::class, 'id_desa');
    }
    public function puskesmas(){
        return $this->belongsTo(Puskesmas::class, 'id_puskesmas');
    }
}

