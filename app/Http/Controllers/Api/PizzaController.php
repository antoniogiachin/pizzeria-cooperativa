<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //
    public function index(){
       
        $pizzas = Pizza::with(["tags"])->get();
        $categories = Category::all();

        return response()->json(
            [
                'results' => [
                                "pizzas" => $pizzas,
                                "categories" => $categories,
                ],
                'success'=>true,
            ]
        );
    }

    // gestione filtro delle pizze per categoria
    public function filter($id){
       
        $pizzas = Pizza::with(["tags"])->where("category_id", $id)->get();
        $categories = Category::all();

        return response()->json(
            [
                'results' => [
                                "pizzas" => $pizzas,
                                "categories" => $categories,
                ],
                'success'=>true,
            ]
        );
    }


    public function show($slug){

        $pizza = Pizza::where('slug', $slug)->first();

        if($pizza){

            if ($pizza->image) {
                $pizza->image = url('storage/' . $pizza->image);
            }

            return response()->json(
                [
                    'results' => $pizza,
                    'success' =>true,
                ]
            );
        } else {
            return response()->json(
                [
                    'results' => 'Pizza non presente nel menu!',
                    'success' => true,
                ]
            );
        }

    }
}
