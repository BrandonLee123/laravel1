<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','description','price','image_url'];
    protected $casts=
    [
        'name'=>'String',
        'price'=>'double',
        'description'=>'String',
        'image_url'=>'array'
    ];
}
