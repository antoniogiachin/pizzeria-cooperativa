<?php

use App\Pizza;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzeMenu = [

            [
                "name" => "Margherita",
                "price" => 7
            ],

            [
                "name" => "Diavola",
                "price" => 8
            ],

            [
                "name" => "Napoli",
                "price" => 9
            ],

            [
                "name" => "Marinara",
                "price" => 6.5
            ],

            [
                "name" => "Cotto e funghi",
                "price" => 9
            ],

            [
                "name" => "Parmigiana",
                "price" => 11
            ],

            [
                "name" => "Speck e noci",
                "price" => 12
            ]

        ];

        foreach($pizzeMenu as $pizza){
            
            $newPizza = new Pizza();
            $newPizza->name = $pizza["name"];
            $newPizza->price = $pizza["price"];
            $newPizza->slug = Str::slug($pizza["name"]);

            $newPizza->save();

        }
    }
}
