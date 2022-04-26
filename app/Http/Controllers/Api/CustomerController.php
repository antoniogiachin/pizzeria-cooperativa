<?php

namespace App\Http\Controllers\Api;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Mail\NewCustomer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name'=> 'required|min:2',
                'email' => 'required|email|min:2',
                'password' => 'required|min:8',
                'address' => 'min:2',
                'phone' => 'min:2',
            ]
        );

        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'results' => $validator->errors(),
                ]
            );
        } else {

            $customer = new Customer();
            $data['password'] = Hash::make($data['password']);
            $customer->fill($data);
            $customer->save();

            // gestisci mail
            Mail::to('admin@boolpizz.com')->send(new NewCustomer($customer));

            return response()->json(
                [
                    'success' => true,
                    'results' => 'Utente inserito con successo!'
                ]
            );
        }
    }

    public function show($email){
        $customer = Customer::where('email', $email)->first();
        if($customer){
            return response()->json(
                [
                    'success' => true,
                    'results' => $customer
                ]
            );
        } else {
            return response()->json(
                [
                    'success'=>false,
                    'results' => ' Nessun utente con questa mail registrato nel sito'
                ]
            );
        }
    }
}
