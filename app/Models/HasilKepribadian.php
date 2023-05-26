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
        return $this->belongsTo('test_histories', 'test_history_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('users', 'user_id', 'id');
    }

    public function kepribadian()
    {
        return $this->belongsTo('kepribadian', 'kepribadian_id', 'id');
    }
}
