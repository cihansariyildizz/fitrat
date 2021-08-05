<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodFormController extends UserAuthController
{
    function foodform() {
        return view('pages.foodform');
    }

    function create(Request $request){
        $request->validate([
            'category' => 'required',
            'name'  => 'required|unique:food,name',
            'description' => 'required',
            'calorie' => 'required|numeric'
        ]);



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
            'description'=> $request->description,
            'calorie'=> $request->calorie,
            'creator'=> $user->name,
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
        if($query){
            return back()->with('success','You have succesfully registered food');
        }else{
            return back()->with('fail','Something Went Wrong');
        }
    }







}
