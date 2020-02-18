<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showProfile($id){
        $user = \App\User::find($id); 
  
        return view('profile')->with(['user'=>$user]);
        
     }
  
     public function editProfile($id){
        if($id==0){ 
            $user=new \App\User();
            $user->id=0;
        }
        else{
            $user = \App\User::find($id);
        }
        return view('profile_edit')->with(['user'=>$user]);
        
    }
  
    public function saveProfile(Request $request,$id){
  
        if($id==0){ 
           \App\User::create($request->all());
        }
        else{
           $user = \App\User::find($id);
           $user->update($request->all());
           
        }
        if($request->file('photo'))
        {
                $path=$request->file('photo')->move('storage/profile',$request->file('photo')->getClientOriginalName());
                $user->update(['image_url'=>$path]);
        }
        return redirect()->route('profile',[$id]);
     }
}
