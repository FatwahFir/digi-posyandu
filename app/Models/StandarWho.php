<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarWho extends Model
{
    use HasFactory;
    protected $table = 'standar_who';
    protected $guarded = ['id'];
}
