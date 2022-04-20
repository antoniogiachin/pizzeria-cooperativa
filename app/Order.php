<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillables = ["name", "number", "address", "pizzaSelected", "message"];
}
