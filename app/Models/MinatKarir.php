<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinatKarir extends Model
{
    use HasFactory;

    protected $table = 'minat_karir';

    protected $guarded = ['id'];

}
