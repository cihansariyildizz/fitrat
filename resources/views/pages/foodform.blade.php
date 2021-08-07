<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.head')
</head>
<body>
    @include('includes.header')
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-6">
                <h4>Veri Form</h4>
                <hr>
                <form action="{{ route('auth.create_food') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="results">
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group mb-3 mt-2">
                        <label for="fileUpload">Images*</label>
                        <input type="file" name="fileUpload" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" name="category">
                          <option selected>Breakfast</option>
                          <option>Lunch</option>
                          <option>Dinner</option>
                        </select>
                        <span class="text-danger">@error('category')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Food Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter food name" >
                        <span class="text-danger">@error('name')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="description">Desctription</label>
                        <input type="textarea" class="form-control" name="description" placeholder="Enter food description" >
                        <span class="text-danger">@error('description')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="calorie">Calorie</label>
                        <input type="text" class="form-control" name="calorie" placeholder="Enter food calorie"  >
                        <span class="text-danger">@error('calorie')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



</html>



