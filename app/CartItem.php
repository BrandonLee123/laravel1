<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable=['name','price','quantity','user_id','session_id','product_id','description'];
    protected $casts=
    [
        'product_id'=>'string',
        'description'=>'string',
        'user_id'=>'String',
        'name'=>'String',
        'price'=>'double',
        'quntity'=>'int',
        'session_id'=>'String'
    ]; 
}
