<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['name','price', 'slug', 'image'];

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }
}
