<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepribadian extends Model
{
    use HasFactory;
    
    protected $table = 'kepribadian';

    protected $guarded = ['id'];

    
}
