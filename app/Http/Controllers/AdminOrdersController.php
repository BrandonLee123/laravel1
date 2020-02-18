<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function show(){

        
        $orders_item=\App\OrdersItem::orderBy('order_id')->get();
        if(count($orders_item)<=0)
        {
            return redirect(route('blank'));
        }
        else
          return view('admin.ordersstatus')->with(['orders_item'=>$orders_item]);

    }

    public function update(Request $request)
    {   
        foreach ($request->input('status') as $rowid => $value) {
            \App\OrdersItem::find($rowid)->update(['status'=>$value]);
            Mail::to('brandonlee.bl98@gmail.com')->send(new \App\Mail\orderstatus());
        }
        return redirect(route('admin.ordersstatus'));
    }
}
