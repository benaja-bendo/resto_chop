<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;


    protected $fillable = [
      'name',
      'profile_photo_path',
      'slug',
      'sigle',
      'email_public',
      'number_public',
    ];
}
