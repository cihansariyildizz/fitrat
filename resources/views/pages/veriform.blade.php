@extends('layouts.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('includes.header')
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-6">
                <h4>Some Informations</h4>
                <hr>
                <form action="{{ route('auth.create_veri') }}" method="post">
                    @csrf
                    <div class="results">
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control" name="gender">

                            <option selected>Female</option>
                            <option>Male</option>

                          </select>
                        <span class="text-danger">@error('activity_level')
                            {{$message}}
                        @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="height">Height</label>

                        <input type="text" class="form-control" name="height" placeholder="Enter food calorie"  >
                        <span class="text-danger">@error('height')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="current_weight">Current Weight</label>
                        <input type="text" class="form-control" name="current_weight" placeholder="Enter food calorie"  >
                        <span class="text-danger">@error('current_weight')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="age">Your Age</label>
                        <input type="text" class="form-control" name="age" placeholder="Enter age" >
                        <span class="text-danger">@error('age')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="activity_level">Activity Level</label>
                        <select id="activity_level" class="form-control" name="activity_level">
                            <option selected>Less</option>
                            <option>Normal</option>
                            <option>More</option>
                          </select>
                        <span class="text-danger">@error('activity_level')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="goal_weight">Goal weight</label>
                        <input type="text" class="form-control" name="goal_weight" placeholder="Enter goal weight" >
                        <span class="text-danger">@error('goal_weight')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="target_day">Target Day</label>
                        <input type="text" class="form-control" name="target_day" placeholder="Enter your target day" >
                        <span class="text-danger">@error('goal_weight')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                <div class="results">
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                </div>
            </div>


        </div>
    </div>

</body>
</html>



