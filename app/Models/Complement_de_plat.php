<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement_de_plat extends Model
{
    use HasFactory;

    protected $fillable = [
        'plat_id',
        'complement_plat_id',
    ];
}
