<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Pizza rossa", "Pizza bianca", "Focaccia", "Calzone"];

        foreach($categories as $category){

            $newCategory = new Category();
            $newCategory->name = $category;
            
            // Considerato l'eventualità nel caso in cui una categoria è composta da più parole
            $newCategory->slug = Str::slug($category); 
        
            $newCategory->save();

        }
    }
}
