<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PernyataanKepribadian extends Model
{
    use HasFactory;

    protected $table = 'pernyataan_kepribadian';

    protected $guarded = ['id'];
}
