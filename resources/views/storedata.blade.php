@include ('header');

</body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <a href="/student" class="btn btn-primary mb-2">Add More Student</a>
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">phone</th>
                    <th scope="col">images</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody class="text-center">
            @foreach ($datastore as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->username}}</td>
                 <td>{{$d->password}}</td>
                <td>{{$d->phone}}</td>
                <td><img src="{{asset('upload/images/'.$d->image)}}" width="100px" height="100px" class="rounded-circle"></td>
                <td class="text-center">
                    <a href="{{route('editdata',$d->id)}}"><button class="btn btn-primary">Edit</button></a>
                    <a href="{{route('delete', $d->id)}}"><button class="btn btn-danger">Delete</button></a>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    {{ $datastore->links() }};
    </div>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('footer');
</html>