<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikar extends Model
{
    use HasFactory;
    protected $fillable = [
        'region',
        'address',
        'city',
        'show_type',
        'type',
        'price',
        'space',
        'user_id',
        'floors_number',
        'room_number',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function photo()
    {
        return $this->hasOne(Photo::class);
    }
    public function request()
    {
        return $this->hasMany(Request::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
