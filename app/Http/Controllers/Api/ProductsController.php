<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function  index()
    {
        $products=\App\Product::orderBy('name')->get();
        return response()->json($products);

        
    }
    public function show($id){
        
        $product=\App\Product::find($id);
        
       if($product==null)
            return redirect(route('errorpage'));

       else
        return view('product')->with(['product'=>$product]);
        
    }

    public function search(Request $request){
        $search = $request->input('search');
        $product = \App\Product::where('name','LIKE','%'.$search.'%')->get();
 
        if(count($product)>0)
            return view("search")->with(['product'=>$product,'search'=>$search]);
        else 
            return view ('welcome')->withMessage('No Details found. Try to search again.');
    }
    
   

}
