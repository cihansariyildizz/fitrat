@extends('layouts.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="edge">
    <title>Document</title>
</head>
<body>
  <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-6">
                <h4>Profile</h4>
                <div class="row">
                    {{ $LoggedUserInfo->name }}
                </div>
                <div class="row">
                    {{ $LoggedUserInfo->email }}
                </div>
                <div class="row">
                    {{ $VerilerInfo->target_calorie }}
                </div>

                <?php $whichday = App\Helpers\whichday::whichday(); ?>

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

                {{-- <div class="row">
                    <button class="btn  btn-dark" type="button"  onclick="window.location.href='foodform'">Next</button>
                </div> --}}
                <a href="logout">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>


