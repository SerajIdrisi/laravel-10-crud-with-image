@include ('header');
<!DOCTYPE html>
<html lang="en">

<head> <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Edit Students</title> <!-- Latest
        compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- jquery cdn 3.7.1 --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
</head> <body>
<div class="container col-md-8"></div> <div class="card"> <div class="card-header">
    <h1 class="text-center">Edit Students Details</h1>
    </div>
    <div class="card-body">
        <form action="{{route('updatedata',$editdata->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" value="{{$editdata->username}}" name="uname" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" value="{{$editdata->password}}" name="pass"
                id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" value="{{$editdata->phone}}" name="mobile"
                id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="imgchange" class="form-label">Images</label>
            <input type="file" class="form-control" value="{{$editdata->image}}" name="img" id="imgchange">
            <!-- <div class="name"></div>{{$editdata->image}}</div> -->
            <div class="name"><img src="{{asset('upload/images/'.$editdata->image)}}" width="100px" height="100px" alt=""></div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

@include('footer');

</html>