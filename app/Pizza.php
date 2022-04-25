<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{

    protected $fillable = ['name','price', 'slug', 'image', 'category_id'];

    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }

}
