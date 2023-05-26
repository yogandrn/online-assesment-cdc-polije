<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PernyataanMinatKarir extends Model
{
    use HasFactory;

    protected $table = 'penyataan_minat_karir';

    protected $guarded = ['id'];

    public function karir()
    {
        return $this->belongsTo('minat_karir', 'minat_karir_id', 'id');
    }

}
