<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $guarded = [

        // 'id', 'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories() {
        return $this->belongsTo(Categories::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
     return ('slug');   
    }
}
