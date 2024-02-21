<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public function post()
    {
        return $this->hasMany(\App\Models\post::class);
    }

    public function User()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
