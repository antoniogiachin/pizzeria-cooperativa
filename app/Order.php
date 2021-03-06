<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["name", "number", "address", "pizzaSelected", "message"];
    protected $table = 'orders';
}
