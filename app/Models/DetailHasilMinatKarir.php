<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailHasilMinatKarir extends Model
{
    use HasFactory;

    protected $table = 'detail_hasil_minat_karir';

    protected $guarded = ['id'];

    protected $with = ['minat_karir'];

    public function hasil()
    {
        return $this->belongsTo('hasil_minat_karir', 'hasil_minat_karir_id', 'id');
    }

    public function minat_karir()
    {
        return $this->hasOne(MinatKarir::class, 'id', 'minat_karir_id');
    }
}
