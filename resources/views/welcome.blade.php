@extends('layouts.head')
<body>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-lg-6  mt-4">
                <div class="row  mobile" >
                    <?php
                    // use ipinfo\ipinfo\IPinfo;
                    // $access_token = '2d699cc6a19a01';
                    // $client = new IPinfo($access_token);
                    // $details = $client->getDetails();
                    // date_default_timezone_set( $details->timezone);

                    $day_array = array($day1,$day2,$day3,$day4,$day5,$day6,$day7);

                    for ($i = 0; $i < 7; $i++) :
                    ?>
                    <div class="card small mt-4 " >
                        <div class="row" style="text-align: cenleftter">
                            <div class="col"  style="align-self: center;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <h4 class="mt-2" style="text-align: center; text-decoration:underline">Day {{$i+1}}</h4>
                                        <h5>Breakfast: {{($day_array[$i][0])->name}} <a class="calories">({{$day_array[$i][0]->calorie}}Cal)</a></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Lunch: {{($day_array[$i][1])->name}} <a class="calories">({{$day_array[$i][1]->calorie}}Cal)</a></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Dinner: {{$day_array[$i][2]->name}} <a class="calories">({{$day_array[$i][2]->calorie}}Cal)</a></h5>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <button type="button" class="btn btn-primary">See Recipes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endfor; ?>
                </div>



                <div>
                    <form action="{{ route('create_foodplan') }}"  method="post">
                        @csrf
                        <input type="submit" name="create_foodplan" class="btn btn-block btn-primary" type="button" />
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>




