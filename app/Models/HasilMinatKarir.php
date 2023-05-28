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
        return $this->belongsTo(TestHistory::class, 'test_history_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detail()
    {
        return $this->hasMany(DetailHasilMinatKarir::class, 'hasil_minat_karir_id', 'id');
    }
}
