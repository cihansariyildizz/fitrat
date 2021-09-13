<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ImageResizeHelper;
use Illuminate\Contracts\Session\Session;

class FoodFormController extends UserAuthController
{
    function foodform() {
        return view('pages.foodform');
    }

    function addproduct(Request $request){

        if ( $request->session()->has('LoggedUser')){

            if ($request->hasFile('fileUpload')) {

                $request->validate([
                    'category' => 'required',
                    'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:204',
                    'name'  => 'required|unique:food,name',
                    'description' => 'required',
                    'calorie' => 'required|numeric',
                    'price' => 'required|numeric'
                ]);

                $request->fileUpload->store('image','public');
                

                if(session()-> has('LoggedUser')){
                    $user = DB::table('users')
                        ->where('id', session('LoggedUser'))
                        ->first();
                }
                //USE QUERYBUILDER

                $query = DB::table('food')
                ->insert([
                    'category'=> $request->category,
                    'name'=> $request->name,
                    'image'=> $request->fileUpload->hashName(),
                    'description'=> $request->description,
                    'calorie'=> $request->calorie,
                    'price'=> $request->price,
                    'creator'=> $user->name,
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ]);

                if($query){
                    return back()->with('success','You have succesfully registered food') ;
                }else{
                    return back()->with('fail','Something Went Wrong');
                }

            }else{
                return back()->with('fail','Please upload an image, it is required!');
            }
        }
        else{
           return redirect('login');
        }
    }
}
