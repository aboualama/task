<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderproduct extends Model
{
    
    protected $table = 'order_product';
    protected $fillable = ['order_id', 'product_id', 'quantity'];
}
