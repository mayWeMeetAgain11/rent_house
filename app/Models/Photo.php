<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'ikar_id',
        'image',
    ];
    public function ikar()
    {
        return $this->belongsTo(Ikar::class);
    }
}
