<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
class OrdersController extends Controller
{
    public function index(){
       
        if(auth()->check())
       {
           $user_id =auth()->user()->id;
           $cart_items=\App\Cartitem::where('user_id',$user_id)->get();
       }
       else
       {
            $cart_items=\App\Cartitem::where('session_id',session()->getId())->get();
       }
       if(count($cart_items)<=0)
       {
           return redirect(route('blank'));
       }
       else
       {
            $total=0;
            foreach($cart_items as $item)
            {
                $total += $item->price * $item->quantity;
            }
        return view('checkout')->with(['cart_items'=>$cart_items , 'total'=>$total]);
       }
    }
    
    public function addOrder(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_name'=>"required|alpha",
            'address'=>"required",
            'email'=>"required",
            'zip'=>"required|numeric",
            'city'=>"required",
            'state'=>"required",
            'phonenum'=>"required",
            'cvv'=>"required|numeric",
            'expyear'=>"required|numeric",
            'expmonth'=>"required",
            'cardnumber'=>"required|numeric",
            'cardname'=>"required"
        ],[

            'user_name.required'=>"Please fill in your name",
            'email.required'=>"Please fill in your email",
            'user_name.alpha'=>"Name can only contains character",
            'address.required'=>"Please fill in your address",
            "zip.required"=>"Please fill in your post code",
            'city.required'=>"Please fill in your city",
            'state.required'=>"Please fill in your state",
            'phonenum.required'=>"Please fill in your contact number",
            'cvv.required'=>"please fill in your credit card cvv",
            'expyear.required'=>"Please fill in your credit card expiry year",
            'expmonth.required'=>"Please fill in your creidt card expiry month",
            'cardnumber.required'=>"Please fill in your credit card number",
            'cardname.required'=>"Please fill in your card holder name"
        ]);
            $validator->validate();
         
            $orders=\App\Orders::create(
                [            
                    'user_id'=>auth()->user()->id,
                    'user_name'=>$request->input('user_name'),
                    'email'=>$request->input('email'),
                    'phonenum'=>$request->input('phonenum'),
                    'address'=>$request->input('address'),
                    'city'=>$request->input('city'),
                    'state'=>$request->input('state'),
                    'zip'=>$request->input('zip')
                ]
                );
                $cart_items=\App\Cartitem::where('user_id',auth()->user()->id)->get();   
                foreach($cart_items as $c)
                {
                    \App\OrdersItem::create([

                        'order_id'=>$orders->id,
                        'product_name'=>$c->name,
                        'quantity'=>$c->quantity
                    ]);
                        $c->delete();
                }
                return view('payment');
    }
}
