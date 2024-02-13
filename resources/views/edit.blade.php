{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>

<div class="container mt-3">
  <h2>Update Form</h2>

  <form action="{{ route('update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3 mt-3">
      <label for="name">Product Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name" value="{{$data->name}}">
      <input type="hidden" class="form-control" id="id" placeholder="Enter full name" name="id" value="{{$data->id}}">
      <span class="text-danger">@error('name')
        {{$message}}
    @enderror</span>
    </div>
    <div class="mb-3">
      <label for="cname">Description:</label>
      <input type="text" class="form-control" id="cname" placeholder="Enter college name" name="cname" value="{{$data->cname}}">
      <span class="text-danger">@error('cname')
        {{$message}}
    @enderror</span>
    </div>
    <div class="mb-3">
        <label for="cat_id">Category: <span class="text-danger">*</span></label>

        <select class="form-control" id="cat_id" name="cat_id" value="">
           @foreach ($data1 as $d)
            <option value="{{$d->id}}">{{$d->catname}}</option>
           @endforeach
        </select>
    </div>

    <div class="mb-3">
      <label for="image">Choose Product:</label>
      <input type="file" class="form-control" id="image" name="image[]" accept="image/*" onchange="previewImage(event)" multiple>
      @php

      $imageArray = explode('|', $data->images);
  @endphp

  @foreach ($imageArray as $image)
      @if ($image)
          <img src="{{ asset('upload/blog/'.$image) }}" width="100px" height="100px" alt="Image">
      @else
          No Image
      @endif
  @endforeach    </div>

    <script>
        function previewImage(event) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var output = document.getElementById('output');
                    output.src = e.target.result;
                    output.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('image-error').innerText = 'Error previewing image.';
            }
        }
    </script>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>

<div class="container mt-3">
  <h2>Update Form</h2>

  <form action="{{ route('update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3 mt-3">
        <label for="name">Product Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name" value="{{$data->name}}">
        <input type="hidden" class="form-control" id="id" placeholder="Enter full name" name="id" value="{{$data->id}}">
        <span class="text-danger">@error('name')
          {{$message}}
      @enderror</span>
      </div>
      <div class="mb-3">
        <label for="cname">Description:</label>
        <input type="text" class="form-control" id="cname" placeholder="Enter college name" name="cname" value="{{$data->cname}}">
        <span class="text-danger">@error('cname')
          {{$message}}
      @enderror</span>
      </div>
      <div class="mb-3">
          <label for="cat_id">Category: <span class="text-danger">*</span></label>

          <select class="form-control" id="cat_id" name="cat_id" value="">
             @foreach ($data1 as $d)
              <option value="{{$d->id}}">{{$d->catname}}</option>
             @endforeach
          </select>
      </div>

    <div class="mb-3">
      <label for="image">Choose Product:</label>
      <input type="file" class="form-control" id="image" name="image[]" accept="image/*" onchange="previewImage(event)" multiple>
      <div id="output"></div>
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
    </div>

    <!-- Your other form fields -->

    <script>
      function previewImage(event) {
        var input = event.target;

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            var output = document.getElementById('output');
            output.innerHTML = '<img src="' + e.target.result + '" width="100px" height="100px" alt="Image">';
          };

          reader.readAsDataURL(input.files[0]);
        } else {
          document.getElementById('output').innerText = 'Error previewing image.';
        }
      }
    </script>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
