<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function admin() {
        return $this->hasOne(Admin::Class);
    }
}
