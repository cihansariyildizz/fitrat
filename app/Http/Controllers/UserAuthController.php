<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Veriler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserAuthController extends Controller
{
    function login() {
        return view('auth.login');
    }
    function register() {
        return view('auth.register');
    }


    function create(Request $request){
        $request->validate([
            'name'  => 'required|min:3|unique:users,name',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:15'
        ]);

        // $base_api = 'b1a2074e56b54ccf99262f978245803f';
        // $requestContent = [
        //     'headers' => [
        //         'content-Type' => 'application/json',
        //     ],
        //     'json' => [
        //         'name' => request()->name,
        //     ]
        // ];

        // try {
        //     $client = new GuzzleHttpClient();
        //     $apiRequest = $client->request('POST', 'https://api.spoonacular.com/users/connect?apiKey='.$base_api, $requestContent);
        //     $response = json_decode($apiRequest->getBody());
        //     $username_ = $response->username;
        //     $hashname_ = $response->hash;

        // } catch (\GuzzleHttp\Exception\RequestException $e) {
        //     echo ($e);
        // }


        //USE QUERYBUILDER
        $query = DB::table('users')
        ->insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>Hash::make( $request->password),
            // 'apiName'=>$username_,
            // 'apiHash'=>$hashname_,
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()

        ]);
        if($query){
            return back()->with('success','You have been succesfully registered');
        }else{
            return back()->with('fail','Something Went Wrong');
        }
    }

    function check(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15'
        ]);

        $user = User::where('email', '=', $request->email) -> first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request-> session() -> put('LoggedUser', $user->id);
                $request-> session() -> put('LoggedUserName', $user->name);
                $user_name = User::where('id', '=', session('LoggedUser')) -> first();
                $userdata = Veriler::where('name', '=', $user_name->name)->first();

                if($userdata != null){
                    return redirect('profile');
                }
                if($userdata == null){
                    return redirect('veriform');
                }
            }else{
                return back() -> with('fail','Invalid password');
            }
        }else{
            return back()->with('fail','No account found for this email');
        }

    }

    function nextpage(){
        if(session()-> has('LoggedUser')){
            $user1 = User::where('id', '=', session('LoggedUser')) -> first();
            $user2 = Veriler::where('name', '=', session('LoggedUserName')) -> first();
            $data = [
                'LoggedUserInfo' => $user1,
                'VerilerInfo' => $user2
            ];
            return view('pages.intermediatepage', $data);
         }else{
            return redirect('login');
         }
    }


    function logout(){
        if(session()-> has('LoggedUser')){
            session() -> pull('LoggedUser');
            return redirect('login');
        }
    }
}

