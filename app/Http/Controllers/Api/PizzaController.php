<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //
    public function index(){

        $pizzas = Pizza::with(["tags", "category"])->get();

        return response()->json(
            [
                'results' => $pizzas,
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
