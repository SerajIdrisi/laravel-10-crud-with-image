@include ('header')

</body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- jquery 3.6.0 cdn   --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .autocomplete {
            margin-top: 38px;
            padding: 10px;
            padding-left: 10px;
            position: absolute;
            width: 100%;
            max-height: 100%;
            overflow-y: auto;
            border: 1px solid #ccc;
            background-color: white;
            z-index: 1;
            cursor:pointer;
        }

        .autocomplete:hover {
            background-color: #f2f2f2;
        }

        /* .autocomplete div {
            padding: 5px;
            cursor: pointer;
        } */
    </style>

</head>

<body>
    <div class="container-fluid mt-5">
        <a href="/student" class="btn btn-primary mb-2 float-end">Add More Student</a>

        <div class="parent">
            <form action="{{route('filter')}}" method="post" class="mb-2">
                @csrf
                <div class="form-group d-flex">
                    <input type="text" name="searchbox" id="search" class="form-control" placeholder="Search!">
                    <button type="submit" name="filtersearch" class="btn btn-dark text-light">Search</button>
                    <div id="searchautocomplete" class="autocomplete"></div>
                </div>
            </form>
        </div>

        <table class="table table-bordered mt-3">
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
                        <td>{{$d->id }}</td>
                        <td>{{$d->username }}</td>
                        <td>{{$d->password }}</td>
                        <td>{{$d->phone }}</td>
                        <td><img src="{{ asset('upload/images/' . $d->image) }}" width="100px" height="100px"
                                class="rounded-circle"></td>
                        <td class="text-center">
                            <a href="{{ route('editdata', $d->id) }}"><button class="btn btn-primary">Edit</button></a>
                            <a href="{{ route('delete', $d->id) }}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
        {{ $datastore->links() }};
    </div>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{--autocplete start here--}}
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let val = $(this).val();
                let _token = $('input[name="_token"]').val();
                if (val && _token != "") {
                    $.ajax({
                        url: "{{ route('auto') }}",
                        method: "POST",
                        data: {searchbox: val, _token: _token},
                        success: function(data) {
                            $('#searchautocomplete').html(data);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                } else {
                    $('#searchautocomplete').html("");
                }
            });
        });
    </script>

    {{--autocomplete end--}}


    {{-- filter--}}
    <script>
        $(document).ready(function(){
            $('#searchbox').keyup(function(){
                let inputdata = $('searchbox').val();
                if (inputdata != ""){
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url : '{{route('filter')}}',
                        type : 'post',
                        data : '{searchbox: inputdata, _token: _token, filtersera}'
                        datatype : 'json',
                    })
                    $.each(data, function(index, item)){
                        $('#searchautocomplete').append('<div id="searchautocomplete" class="autocomplete"></div>')
                    }
                }
            })
        })
    </script>

    {{--filter end--}}


</body>
@include('footer')

</html>
