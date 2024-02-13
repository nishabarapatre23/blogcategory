<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<body>
<br>
    <a href="{{route('category')}}"><button class="btn-primary rounded" style="position: relative; left:1000px">Add Category</button></a>


    <div class="container">
        <h2>Category Table</h2>
        <br><br>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{$d->catname}}</td>
                    <td>{{$d->status}}</td>

                <td>
                   <a href="{{url('category/edit',$d->id)}}"><button class="btn btn-success">Edit</button></a>
                   <a href="{{ route('category.delete', ['id' => $d->id]) }}"><button class="btn btn-danger rounded">Delete</button></a>
                </td>
              </tr>
                @endforeach
                </table>
            </div>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            @if (Session::has('success'))
            <script>
              swal({
                    title: "{{ Session::get('success')}}",
                    text: "You stored the data!",
                    icon: "success",
                    button: "Aww yiss!",
                    });
            </script>
            @endif

            @if (Session::has('error'))
            <script>
              swal({
                    title: "{{ Session::get('error')}}",
                    text: "You deleted the data!",
                    icon: "error",
                    button: "Okay!",
                    });
            </script>
            @endif

    </body>
</html>
