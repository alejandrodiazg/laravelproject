<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $guarded = [

        'id', 'created_at', 'updated_at'
    ];

    public function articles() {
        return $this->hasMany(Articles::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
