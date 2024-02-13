<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>


    <div class="container mt-3">
    <a href="{{route('create')}}"><button class="btn-primary rounded" style="position: relative; left:1000px">Add Blog</button></a>

    <h2>Blog Table</h2>
  <br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product name</th>
        <th>Description</th>
        <th>Product Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        {{-- @dd($data) --}}
        @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->cname }}</td>
                <td>
                    @php

                        $imageArray = explode('|', $data->images);
                    @endphp

                    @foreach ($imageArray as $image)
                        @if ($image)
                            <img src="{{ asset('upload/blog/'.$image) }}" width="100px" height="100px" alt="Image">
                        @else
                            No Image
                        @endif
                    @endforeach
                </td>


                <td>
                    <a href="{{ route('show', $data->id) }}"><button class="btn btn-primary">View</button></a>
                    <a href="{{ route('edit', $data->id) }}"><button class="btn btn-success">Edit</button></a>
                    <a href="{{ route('delete', $data->id) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
        @endforeach
    </tbody>

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
