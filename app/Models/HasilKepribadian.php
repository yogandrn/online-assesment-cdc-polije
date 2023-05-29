<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKepribadian extends Model
{
    use HasFactory;

    protected $table = 'hasil_kepribadian';

    protected $guarded = ['id'];

    public function test()
    {
        return $this->belongsTo(TestHistory::class, 'test_history_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kepribadian()
    {
        return $this->belongsTo(Kepribadian::class, 'kepribadian_id', 'id');
    }
}
