<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'Pasien';
    protected $guarded = ['id'];

    public function keluarga(){
        return $this->belongsTo(Keluarga::class, 'no_kk', 'no_kk')->withDefault(['no_kk' => '-']);
    }

    public function posyandu(){
        return $this->belongsTo(Posyandu::class, 'id_posyandu');
    }
}
