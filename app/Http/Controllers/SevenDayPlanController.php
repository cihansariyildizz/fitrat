<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Veriler;
use App\Models\SevenDayPlan;
use Illuminate\Support\Facades\DB;
class SevenDayPlanController extends Controller
{
    function planner(){
        // breakfast
        $query = DB::table('seven_day_plans')->where('category','=','breakfast')->where('name', '=', session('LoggedUserName')) -> first();
        $user_data = Veriler::where('name', '=', session('LoggedUserName')) -> first();
        $meals = Food::where('category','breakfast')->where( 'calorie', '>=', ((($user_data->target_calorie)/3)-250 )) -> where('calorie', '<=' , (($user_data->target_calorie)/3)+250 )  ->  inRandomOrder() ->limit(7) -> get();
        echo ($query->name);
        echo ($user_data );
        echo ($meals );
            if(!$query){
                    $array = array();
                    $i = 0;
                    foreach($meals as $meal){
                        $array[$i] = $meal->name;
                        $i++;
                    }
                    echo ('no1');
                    $query = DB::table('seven_day_plans')->insert([
                        'name' =>  session('LoggedUserName'),
                        'category' =>  'breakfast',
                        'day1' => $array[0],
                        'day2' => $array[1],
                        'day3' => $array[2],
                        'day4' => $array[3],
                        'day5' => $array[4],
                        'day6' => $array[5],
                        'day7' => $array[6],
                        "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    ]);
            }else{
                $array = array();
                $i = 0;
                foreach($meals as $meal){
                    $array[$i] = $meal->name;
                    $i++;
                }
                echo ('no22');
                $query = DB::table('seven_day_plans')->where('name', '=', session('LoggedUserName'))->where('category','=','breakfast')->update([
                    'day1' => $array[0],
                    'day2' => $array[1],
                    'day3' => $array[2],
                    'day4' => $array[3],
                    'day5' => $array[4],
                    'day6' => $array[5],
                    'day7' => $array[6],
                    "updated_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                ]);

            }
            unset($array);

             // lunch
             $query = DB::table('seven_day_plans')->where('category', '=','lunch')->where('name', '=', session('LoggedUserName')) -> first();
             $user_data = Veriler::where('name', '=', session('LoggedUserName')) -> first();
             $meals = Food::where('category','lunch')->where( 'calorie', '>=', ((($user_data->target_calorie)/3)-250 )) -> where('calorie', '<=' , (($user_data->target_calorie)/3)+250 )  ->  inRandomOrder() ->limit(7) -> get();
             echo ($query->name );
             echo ($user_data );
             echo ($meals );
                 if(!$query){
                         $array = array();
                         $i = 0;
                         foreach($meals as $meal){
                             $array[$i] = $meal->name;
                             $i++;
                         }
                         echo ('no2');
                         $query = DB::table('seven_day_plans')->insert([
                             'name' =>  session('LoggedUserName'),
                             'category' =>  'Lunch',
                             'day1' => $array[0],
                             'day2' => $array[1],
                             'day3' => $array[2],
                             'day4' => $array[3],
                             'day5' => $array[4],
                             'day6' => $array[5],
                             'day7' => $array[6],
                             "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                         ]);
                 }else{
                     $array = array();
                     $i = 0;
                     foreach($meals as $meal){
                         $array[$i] = $meal->name;
                         $i++;
                     }
                     echo ('no22');
                     $query = DB::table('seven_day_plans')->where('name', '=', session('LoggedUserName'))->where('category', '=','lunch')->update([
                         'day1' => $array[0],
                         'day2' => $array[1],
                         'day3' => $array[2],
                         'day4' => $array[3],
                         'day5' => $array[4],
                         'day6' => $array[5],
                         'day7' => $array[6],
                         "updated_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                     ]);

                 }

                 unset($array);

            // dinner
            $query = DB::table('seven_day_plans')->where('category', '=','dinner')->where('name', '=', session('LoggedUserName')) -> first();
            $user_data = Veriler::where('name', '=', session('LoggedUserName')) -> first();
            $meals = Food::where('category','dinner')->where( 'calorie', '>=', ((($user_data->target_calorie)/3)-250 )) -> where('calorie', '<=' , (($user_data->target_calorie)/3)+250 )  ->  inRandomOrder() ->limit(7) -> get();
            echo ($query->name );
            echo ($user_data );
            echo ($meals );
                if(!$query){
                        $array = array();
                        $i = 0;
                        foreach($meals as $meal){
                            $array[$i] = $meal->name;
                            $i++;
                        }
                        echo ('no2');
                        $query = DB::table('seven_day_plans')->insert([
                            'name' =>  session('LoggedUserName'),
                            'category' =>  'dinner',
                            'day1' => $array[0],
                            'day2' => $array[1],
                            'day3' => $array[2],
                            'day4' => $array[3],
                            'day5' => $array[4],
                            'day6' => $array[5],
                            'day7' => $array[6],
                            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                        ]);
                }else{
                    $array = array();
                    $i = 0;
                    foreach($meals as $meal){
                        $array[$i] = $meal->name;
                        $i++;
                    }
                    echo ('no22');
                    $query = DB::table('seven_day_plans')->where('name', '=', session('LoggedUserName'))->where('category', '=','dinner')->update([
                        'day1' => $array[0],
                        'day2' => $array[1],
                        'day3' => $array[2],
                        'day4' => $array[3],
                        'day5' => $array[4],
                        'day6' => $array[5],
                        'day7' => $array[6],
                        "updated_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    ]);

                }

                unset($array);



    }

    function showPlan(){
        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts1= Food::where('name',  $breakfasts->day1 ) -> first();
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch1= Food::where('name',  $lunch->day1 ) -> first();
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner1= Food::where('name',  $dinner->day1 ) -> first();
        $day1 = [$breakfasts1, $lunch1, $dinner1];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts2= Food::where('name',  $breakfasts->day2 ) -> first();
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch2= Food::where('name',  $lunch->day2 ) -> first();
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner2= Food::where('name',  $dinner->day2 ) -> first();
        $day2 = [$breakfasts2, $lunch2, $dinner2];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts3= Food::where('name',  $breakfasts->day3 ) -> first();
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch3= Food::where('name',  $lunch->day3 ) -> first();
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner3= Food::where('name',  $dinner->day3 ) -> first();
        $day3 = [$breakfasts3, $lunch3, $dinner3];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts4= Food::where('name',  $breakfasts->day4 ) -> first();
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch4= Food::where('name',  $lunch->day4 ) -> first();
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner4= Food::where('name',  $dinner->day4 ) -> first();
        $day4 = [$breakfasts4, $lunch4, $dinner4];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts5= Food::where('name',  $breakfasts->day5 ) -> first();
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch5= Food::where('name',  $lunch->day5 ) -> first();
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner5= Food::where('name',  $dinner->day5 ) -> first();
        $day5 = [$breakfasts5, $lunch5, $dinner5];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts6= Food::where('name',  $breakfasts->day6 ) -> first();
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch6= Food::where('name',  $lunch->day6 ) -> first();
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner6= Food::where('name',  $dinner->day6 ) -> first();
        $day6 = [$breakfasts6, $lunch6, $dinner6];

        $breakfasts = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $breakfasts7= Food::where('name',  $breakfasts->day7 ) -> first();
        $lunch = SevenDayPlan::where('category', '=', 'lunch' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $lunch7= Food::where('name',  $lunch->day7 ) -> first();
        $dinner = SevenDayPlan::where('category', '=', 'dinner' ) ->where('name', '=', session('LoggedUserName') )-> first();
        $dinner7= Food::where('name',  $dinner->day7 ) -> first();
        $day7 = [$breakfasts7, $lunch7, $dinner7];


        $data = [
            'day1' => $day1,
            'day2' => $day2,
            'day3' => $day3,
            'day4' => $day4,
            'day5' => $day5,
            'day6' => $day6,
            'day7' => $day7
        ];

        return view('welcome', $data);


        // $meals = DB::table('food')->where('name', '=', session('LoggedUserName')) -> get();
        // $meals->setRelation('')
    }

}

