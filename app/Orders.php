<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable=[
        'user_name',
        'user_id',
        'email','phonenum','address','city','state',
        'zip'
    ];
    protected $casts=
    [
        'user_name'=>'String',
        'user_id'=>'String',
        'email'=>'String',
        'phonenum'=>'String',
        'address'=>'String',
        'city'=>'string',
        'state'=>'string',
        'zip'=>'string'
    ];
}
