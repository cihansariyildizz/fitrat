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
        // if(session()-> has('LoggedUser')){
        //     $user1 = User::where('id', '=', session('LoggedUser')) -> first();
        //     $user2 = Veriler::where('name', '=', session('LoggedUserName')) -> first();
        //     $fooData = SevenDayPlan::where('name', '=', session('LoggedUserName')) -> first();
        //     $data = [
        //         'LoggedUserInfo' => $user1,
        //         'VerilerInfo' => $user2,
        //     ];
        //     return view('admin.profile', $data);
        //  }
        //  else{
        //     return redirect('login');
        //  }
        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts1=   $breakfasts->day1;
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch1=  $lunch->day1;
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner1=  $dinner->day1;
        $day1 = [$breakfasts1, $lunch1, $dinner1];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts2= $breakfasts->day2;
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch2= $lunch->day2;
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner2= $dinner->day2;
        $day2 = [$breakfasts2, $lunch2, $dinner2];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts3=  $breakfasts->day3;
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch3=  $lunch->day3;
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner3= $dinner->day3;
        $day3 = [$breakfasts3, $lunch3, $dinner3];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts4= $breakfasts->day4;
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch4=  $lunch->day4;
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner4=  $dinner->day4;
        $day4 = [$breakfasts4, $lunch4, $dinner4];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts5=  $breakfasts->day5;
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch5=  $lunch->day5;
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner5= $dinner->day5;
        $day5 = [$breakfasts5, $lunch5, $dinner5];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts6= $breakfasts->day6 ;
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch6=  $lunch->day6 ;
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner6=  $dinner->day6;
        $day6 = [$breakfasts6, $lunch6, $dinner6];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts7=  $breakfasts->day7;
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch7= $lunch->day7;
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner7= $dinner->day7;
        $day7 = [$breakfasts7, $lunch7, $dinner7];

        $user1 = User::where('id', '=', session('LoggedUser')) -> first();
        $user2 = Veriler::where('name', '=', session('LoggedUserName')) -> first();
        $data = [
            'day1' => $day1,
            'day2' => $day2,
            'day3' => $day3,
            'day4' => $day4,
            'day5' => $day5,
            'day6' => $day6,
            'day7' => $day7,
            'LoggedUserInfo' => $user1,
            'VerilerInfo' => $user2
        ];

        return view('user.profile', $data);


    }

}

