<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data,[
            "name" => "required | min:3",
            "number" => "required | min:9 | max: 13",
            "address" => "required | min: 5",
            "pizzaSelected" => "required | min: 4",
            "message" => "nullable | min:8 | max:500"
        ]);



        if($validator->fails()){

            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ]);

        } else {

            $order = new Order();
            $order->fill($data);
            $order->save();


            // preimpostato completare configurandolo opportunamente
            Mail::to("ordine@pizzeria.com")->send(new NewOrder($order));

            return response()->json([
                "success" => true,
            ]);

        }

    }

    public function index()
    {

        $orders = Order::all();
        return response()->json(
            [
                'results' => $orders,
                'success' => true,
            ]
        );
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();

        if ($order) {
            return response()->json(
                [
                    'results' => $order,
                    'success' => true,
                ]
            );
        } else {
            return response()->json(
                [
                    'results' => 'Ordine non presente nei nostri sistemi',
                    'success' => false,
                ]
            );
        }
    }
}
