<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplementPlat extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'type_complement',
        'restaurant_id',
        'price',
    ];
}
