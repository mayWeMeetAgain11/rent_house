<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ikar_id',
        'discription',
        'rating',
    ];

    public function ikar()
    {
        return $this->belongsTo(Ikar::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
