<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Veriler;
use Error;

class VerilerFormController extends Controller
{
    function veriform() {
        return view('pages.veriform');
    }

    function create(Request $request){
        $request->validate([
            'height' => 'required|numeric|max:220|min:60',
            'current_weight'  => 'required|numeric|max:160|min:30',
            'age' => 'required|integer|max:100|min:1',
            'goal_weight'  => 'required|numeric|max:120|min:20',
            'target_day' => 'required|numeric|max:120|min:20',

        ]);

        //calculation basal mat rate
        if($request->gender == 'Male'){
            $height_ = $request->height;
            $current_weight_ = $request->current_weight;
            $goal_weight_ = $request->goal_weight;
            $target_day_ = $request->target_day;
            $age_ = $request->age;
            $target_calorie = 88.362  + (13.397*$current_weight_) + (4.799*$height_)-(5.677 * $age_);
            if($request->activity_level == "Less"){
                $BMR = (88.362  + (13.397*$current_weight_) + (4.799*$height_)-(5.677 * $age_));
            }
            if($request->activity_level == "Normal"){
                $BMR = (88.362  + (13.397*$current_weight_) + (4.799*$height_)-(5.677 * $age_))*1.2;
            }
            if($request->activity_level == "More"){
                $BMR = (88.362  + (13.397*$current_weight_) + (4.799*$height_)-(5.677 * $age_))*1.4;
            }
            $weigth_difference = ($current_weight_ - $goal_weight_ );
            $calorie_deficiet_one_day = (7000 * $weigth_difference) / $target_day_;
            $target_calorie =  $BMR - $calorie_deficiet_one_day;
            $weigth_difference = ($current_weight_ - $goal_weight_ );
            $calorie_deficiet_one_day = (7700 * $weigth_difference) / $target_day_;
            $target_calorie =  $BMR - $calorie_deficiet_one_day;
            if($target_calorie <= 1000){
                return back()->with('fail','Something Went Wrong');
            }
        }
        if($request->gender == 'Female'){
            $height_ = $request->height;
            $current_weight_ = $request->current_weight;
            $goal_weight_ = $request->goal_weight;
            $target_day_ = $request->target_day;
            $age_ = $request->age;
            if($request->activity_level == "Less"){
                $BMR = (88.362  + (13.397*$current_weight_) + (4.799*$height_)-(5.677 * $age_));
            }
            if($request->activity_level == "Normal"){
                $BMR = (88.362  + (13.397*$current_weight_) + (4.799*$height_)-(5.677 * $age_))*1.2;
            }
            if($request->activity_level == "More"){
                $BMR = (88.362  + (13.397*$current_weight_) + (4.799*$height_)-(5.677 * $age_))*1.4;
            }
            $weigth_difference = ($current_weight_ - $goal_weight_ );
            $calorie_deficiet_one_day = (7700 * $weigth_difference) / $target_day_;
            $target_calorie =  $BMR - $calorie_deficiet_one_day;
            if($target_calorie <= 1000){
                return back()->with('fail','Your targetett calorie is under 1000cal, please choose values again');
            }

        }

        if(session()-> has('LoggedUser')){
            // $user = User::where('id', '=', session('LoggedUser')) -> first();
            $user = DB::table('users')
                ->where('id', session('LoggedUser'))
                ->first();
        }
        $query = DB::table('verilers')
        ->insert([
            'name' => $user->name,
            'gender' => $request->gender,
            'height'=> $request->height,
            'current_weight'=> $request->current_weight,
            'age'=> $request->age,
            'activity_level'=> $request->activity_level,
            'goal_weight'=> $request->goal_weight,
            'target_calorie'=> $target_calorie,
            'target_day'=> $request->target_day,
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);


        if($query){
            return redirect('welcoming');
        }else{
            return back()->with('fail','Something Went Wrong');
        }


    }


}
