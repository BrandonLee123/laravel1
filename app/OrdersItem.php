<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersItem extends Model
{
    protected $fillable=['product_id','product_name','quantity','order_id','status'];

    protected $cast=[
        'order_id'=>'string',
        'product_id'=>'String',
        'product_name'=>'String',
        'quantity'=>'integer',
        'status'=>'string'
    ];
}


