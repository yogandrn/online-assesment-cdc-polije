<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilMinatKarir extends Model
{
    use HasFactory;
    
    protected $table = 'hasil_minat_karir';

    protected $guarded = ['id'];

    public function test()
    {
        return $this->belongsTo('test_histories', 'test_history_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('users', 'user_id', 'id');
    }

    public function hasil()
    {
        return $this->hasMany('detail_hasil_minat_karir', 'hasil_minat_karir_id', 'id');
    }
}
