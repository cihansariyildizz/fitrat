<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\SevenDayPlan;

class whichday
{

    public static function whichday()
    {


                    $todayinnumber = date("d");
                    $dayplanbreakfast = SevenDayPlan::where('category', '=', 'breakfast' ) ->where('name', '=', session('LoggedUserName') )-> first();

                    $dateupdated = $dayplanbreakfast->updated_at;
                    $pieces = explode(" ", $dateupdated);

                    $dayupdated_ = explode("-", $pieces[0]);
                    $dayupdated_ =  intval($dayupdated_[2]);//as a day



                    if($dayupdated_ != 31 ){
                      if($todayinnumber < $dayupdated_ ){
                            $todayinnumber  = $todayinnumber + 30;
                            $day_difference = $todayinnumber - $dayupdated_;

                            if($day_difference <= 6 ){
                                $todayday = $day_difference+1;
                                return $todayday;
                            }
                            if($day_difference > 6 ){
                                return "update_needed";
                            }

                            // $mod =  $todayinnumber %
                        }

                        if($todayinnumber >= $dayupdated_ ){
                            $day_difference = $todayinnumber - $dayupdated_;

                            if($day_difference <= 6 ){
                                $todayday = $day_difference+1;
                                return $todayday;
                            }
                           if($day_difference > 6 ) {
                                return "update_needed";
                            }

                        }
                    }
    }
}
