<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'login_title',
        'logo',
        'background_image',
        'description',
        'description_title',
    ];
}
