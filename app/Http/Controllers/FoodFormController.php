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

    function create(Request $request){

        if ( $request->session()->has('LoggedUser')){

            if ($request->hasFile('fileUpload')) {

                $request->validate([
                    'category' => 'required',
                    'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:204',
                    'name'  => 'required|unique:food,name',
                    'description' => 'required',
                    'calorie' => 'required|numeric'
                ]);


                // Save the file locally in the storage/public/ folder under a new folder named /product

            $image = $request->fileUpload;
            $path = ImageResizeHelper::uploadPostImageWithSizes($image, 'image');


                if(session()-> has('LoggedUser')){
                    // $user = User::where('id', '=', session('LoggedUser')) -> first();
                    $user = DB::table('users')
                        ->where('id', session('LoggedUser'))
                        ->first();
                }
                //USE QUERYBUILDER

                $query = DB::table('food')
                ->insert([
                    'category'=> $request->category,
                    'name'=> $request->name,
                    'image'=> $path,
                    'description'=> $request->description,
                    'calorie'=> $request->calorie,
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
