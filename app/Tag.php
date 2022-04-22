<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["name", "slug"];

    public function pizzas(){
        return $this->belongsToMany("App\Pizza");
    }
}
