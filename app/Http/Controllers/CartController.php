<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;

class CartController extends Controller
{
    public function show()
    {
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
            $cart_total=0;
            foreach($cart_items as $item)
            {
                $cart_total += $item->price * $item->quantity;
            }
            return view('shoppingcart')->with(['cart_items'=>$cart_items ,'cart_total'=>$cart_total]);
       }
       
       
    }
    
    public function addCart(Request $request,$id)
    {
        if(auth()->check())
        {
            $user_id =auth()->user()->id;
        }
        else{
            $user_id=null;
        }
        

        $product=\App\Product::find($id);

        \App\Cartitem::create(
            [
                'session_id'=>session()->getId(),
                'user_id'=>$user_id,
                'product_id'=>$product->id,
                'name'=>$product->name,
                'description'=>$product->description,
                'quantity'=>$request->input('quantity'),
                'price'=>$product->price,

            ]);

            
            return redirect(route('Products'));
            
    }
    
    public function deleteItem($id){
        if(auth()->check()){
            $user_id=auth()->user()->id;
            $cart_items=\App\Cartitem::where('user_id',$user_id)->where('id',$id)->get();
        }
        else{
            $cart_items=\App\Cartitem::where('session_id',session()->getId())->where('id',$id)->get();
        }
        foreach($cart_items as$p){
            $p->delete();
        }
        return redirect(route('cartitem'));
    }
    public function update(Request $request){
        foreach ($request->input('quantity') as $rowid => $value) {
            \App\CartItem::find($rowid)->update(['quantity'=>$value]);
        }
        return redirect(route('cartitem'));
    }
   
}
