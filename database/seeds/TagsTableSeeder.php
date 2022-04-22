<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["vegetariano", "senza glutine", "carne", "pesce", "km 0"];
    
        foreach($tags as $tag){

            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);
            
            $newTag->save();

        }
    }
}
