<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AdminProductsController extends Controller
{
    public function  index()
    {
        $products=\App\Product::orderBy('name')->get();
        return response()->json($products);
    }
    public function edit($id)
    {
        if($id==0)
        {
            $product=new \App\Product();
            $product->id=0;
        }
        else
        {
            $product=\App\Product::find($id); 
        }
        return view('admin.productsedit')->with(['product'=>$product]);
    }
    public function save(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
            ['name'=>"required|max:30",
             'price'=>"required|numeric"
            ],
            [
                'name.required'=>"Please fill in the name",
                'name.max'=>"Name should not exceed 30 characters",
                'price.required'=>"Please fill in the price",
                'price.numeric'=>"Price only can contain number"
            ]);
        $validator->validate();

        if($id==0){

            $product=\App\Product::create($request->all());
            

        }
        else
        {
            $product= \App\Product::find($id);
            $product->update($request->all());
        }
        if($request->file('photo'))
            {
                $images=[];
                foreach($request->file('photo') as $photo)
                {
                  $path=$photo->move('storage/products',$photo->getClientOriginalName());
                  array_push($images,$path->getPathName());
                }
                $product->update(['image_url'=>$images]);
            }
        
        return redirect(route('admin.products'));
    }
     
    public function delete($id)
    {
        $product=\App\Product::find($id);

        $product->delete();

         return redirect(route('admin.products'));
    }
    
}