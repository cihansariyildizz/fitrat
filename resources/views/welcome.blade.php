@extends('layouts.head')
<body>
    @include('includes.header')
    <div class="container">
        <div class="row" >
            <div class="col-md-6">
                <div class="row" >
                    <div class="card mt-2" >
                        <h4 style="text-align: center; text-decoration:underline">Day 1</h4>
                        <div class="row mt-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day1[0]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day1[0]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left">
                                <h5>Lunch: {{$day1[1]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day1[1]->calorie}}Cal)  </h6>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col" style="text-align: left">
                                <h5>Dinner: {{$day1[2]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day1[2]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2" >
                        <h4 style="text-align: center; text-decoration:underline">Day 2</h4>
                        <div class="row mt-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day2[0]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day2[0]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day2[1]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day2[1]->calorie}}Cal)  </h6>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day2[2]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day2[2]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2" >
                        <h4 style="text-align: center; text-decoration:underline">Day 3</h4>
                        <div class="row mt-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day3[0]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day3[0]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left">
                                <h5>Lunch: {{$day3[1]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day3[1]->calorie}}Cal)  </h6>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col" style="text-align: left">
                                <h5>Dinner: {{$day3[2]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day3[2]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2" >
                        <h4 style="text-align: center; text-decoration:underline">Day 4</h4>
                        <div class="row mt-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day4[0]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day4[0]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day4[1]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day4[1]->calorie}}Cal)  </h6>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day4[2]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day4[2]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2" >
                        <h4 style="text-align: center; text-decoration:underline">Day 5</h4>
                        <div class="row mt-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day5[0]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day5[0]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day5[1]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day5[1]->calorie}}Cal)  </h6>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day5[2]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day5[2]->calorie}}Cal)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2" >
                        <h4 style="text-align: center; text-decoration:underline">Day 6</h4>
                        <div class="row mt-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day6[0]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day6[0]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day6[1]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day6[1]->calorie}}Cal)  </h5>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day6[2]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day6[2]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2" >
                        <h4 style="text-align: center; text-decoration:underline">Day 7</h4>
                        <div class="row mt-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day7[0]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day7[0]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day7[1]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day7[1]->calorie}}Cal)  </h6>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col" style="text-align: left">
                                <h5>Breakfast: {{$day7[2]->name}}</h5>
                            </div>
                            <div class="col">
                                <h6> ({{$day7[2]->calorie}}Cal)  </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




