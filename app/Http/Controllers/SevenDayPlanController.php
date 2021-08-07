<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Veriler;
use App\Models\SevenDayPlan;
use Facade\FlareClient\Api;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client as GuzzleHttpClient;
use App\Models\User;
class SevenDayPlanController extends Controller
{

        function generateMealPlan7days()
        {

            $userInfo = Veriler::where('name', '=', session('LoggedUserName')) -> first();

            $api = 'b1a2074e56b54ccf99262f978245803f';
            $requestContent = [
                'headers' => [
                    'content-Type' => 'application/json',
                ],
            ];
            try {
                $client = new GuzzleHttpClient();
                //will bring 7 day plan for user according to his target calorie
                $apiRequest = $client->request('GET', 'https://api.spoonacular.com/mealplanner/generate?'.$userInfo->target_calorie.'&apiKey='.$api, $requestContent);
                $response = json_decode($apiRequest->getBody());
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                echo ($e);
            }

        $query = DB::table('seven_day_plans')->where('category','=','breakfast')->where('name', '=', session('LoggedUserName')) -> first();
                if(!$query){
                //breakfast
                DB::table('seven_day_plans')
                ->insert([
                    'name'=> $userInfo->name,
                    'category'=> 'breakfast',
                    'day1' => $response->week->monday->meals[0]->id,
                    'day2' => $response->week->tuesday->meals[0]->id,
                    'day3' => $response->week->wednesday->meals[0]->id,
                    'day4' => $response->week->thursday->meals[0]->id,
                    'day5' => $response->week->friday->meals[0]->id,
                    'day6' => $response->week->saturday->meals[0]->id,
                    'day7' => $response->week->sunday->meals[0]->id,
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ]);
            }else{
                DB::table('seven_day_plans')->where('name', '=', session('LoggedUserName'))->where('category','=','breakfast')
                ->update([
                    'day1' => $response->week->monday->meals[0]->id,
                    'day2' => $response->week->tuesday->meals[0]->id,
                    'day3' => $response->week->wednesday->meals[0]->id,
                    'day4' => $response->week->thursday->meals[0]->id,
                    'day5' => $response->week->friday->meals[0]->id,
                    'day6' => $response->week->saturday->meals[0]->id,
                    'day7' => $response->week->sunday->meals[0]->id,
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ]);

            }
            $query = DB::table('seven_day_plans')->where('category','=','lunch')->where('name', '=', session('LoggedUserName')) -> first();
            if(!$query){
            //breakfast
            DB::table('seven_day_plans')
            ->insert([
                'name'=> $userInfo->name,
                'category'=> 'lunch',
                'day1' => $response->week->monday->meals[1]->id,
                'day2' => $response->week->tuesday->meals[1]->id,
                'day3' => $response->week->wednesday->meals[1]->id,
                'day4' => $response->week->thursday->meals[1]->id,
                'day5' => $response->week->friday->meals[1]->id,
                'day6' => $response->week->saturday->meals[1]->id,
                'day7' => $response->week->sunday->meals[1]->id,
                "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
            ]);
        }else{
            DB::table('seven_day_plans')->where('name', '=', session('LoggedUserName'))->where('category','=','lunch')
            ->update([
                'day1' => $response->week->monday->meals[1]->id,
                'day2' => $response->week->tuesday->meals[1]->id,
                'day3' => $response->week->wednesday->meals[1]->id,
                'day4' => $response->week->thursday->meals[1]->id,
                'day5' => $response->week->friday->meals[1]->id,
                'day6' => $response->week->saturday->meals[1]->id,
                'day7' => $response->week->sunday->meals[1]->id,
                "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
            ]);

        }
                $query = DB::table('seven_day_plans')->where('category','=','dinner')->where('name', '=', session('LoggedUserName')) -> first();
                if(!$query){
                //breakfast
                DB::table('seven_day_plans')
                ->insert([
                    'name'=> $userInfo->name,
                    'category'=> 'dinner',
                    'day1' => $response->week->monday->meals[2]->id,
                    'day2' => $response->week->tuesday->meals[2]->id,
                    'day3' => $response->week->wednesday->meals[2]->id,
                    'day4' => $response->week->thursday->meals[2]->id,
                    'day5' => $response->week->friday->meals[2]->id,
                    'day6' => $response->week->saturday->meals[2]->id,
                    'day7' => $response->week->sunday->meals[2]->id,
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ]);
            }else{
                DB::table('seven_day_plans')->where('name', '=', session('LoggedUserName'))->where('category','=','dinner')
                ->update([
                    'day1' => $response->week->monday->meals[2]->id,
                    'day2' => $response->week->tuesday->meals[2]->id,
                    'day3' => $response->week->wednesday->meals[2]->id,
                    'day4' => $response->week->thursday->meals[2]->id,
                    'day5' => $response->week->friday->meals[2]->id,
                    'day6' => $response->week->saturday->meals[2]->id,
                    'day7' => $response->week->sunday->meals[2]->id,
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ]);

            }
            return redirect('profile');

    }



    function show(){
        if(session()-> has('LoggedUser')){
            $user1 = User::where('id', '=', session('LoggedUser')) -> first();
            $user2 = Veriler::where('name', '=', session('LoggedUserName')) -> first();
            $user2 = SevenDayPlan::where('name', '=', session('LoggedUserName')) -> first();
            $data = [
                'LoggedUserInfo' => $user1,
                'VerilerInfo' => $user2
            ];
            return view('admin.profile', $data);
         }
         else{
            return redirect('login');
         }
    }

}

