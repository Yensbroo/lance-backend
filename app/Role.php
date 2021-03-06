<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    function users() {
        return $this->hasMany(User::class);
    }
}
