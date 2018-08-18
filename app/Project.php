<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use Searchable;

    protected $guarded = [];

    public function path() {
        return "/projects/{$this->id}";
    } 

    public function bids() {
        return $this->hasMany(Bid::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
