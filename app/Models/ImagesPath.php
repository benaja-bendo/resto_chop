<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesPath extends Model
{
    use HasFactory;

    protected $fillable =[
      'reference',
      'ref_id',
      'image_path',
    ];
}
