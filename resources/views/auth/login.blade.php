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
                <h4>User Login</h4>
                <hr>
                <form action="{{ route('auth.check') }}" method="post">
                    @csrf
                    <div class="results">
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ old ('email') }}">
                        <span class="text-danger">@error('email')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Email</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        <span class="text-danger">@error('password')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                    </div>
                    <br>
                    <a href="register"> Create an new Account now</a>
                </form>
            </div>


        </div>
    </div>

</body>
</html>



