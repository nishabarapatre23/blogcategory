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
  <h2>BLOG</h2>

  <form action="{{ route('store') }}" method="POST" id="myForm" enctype="multipart/form-data">
    @csrf

    <div class="mb-3 mt-3">
      <label for="name">Product Name: <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" value="{{old('name')}}">
      <span class="text-danger">@error('name')
        {{$message}}
    @enderror</span>
    </div>
    <div class="mb-3">
      <label for="cname">Description: <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="cname" placeholder="Enter description" name="cname" value="{{old('cname')}}">
      <span class="text-danger">@error('cname')
        {{$message}}
    @enderror</span>
    </div>

    <div class="mb-3">
        <label for="cat_id">Category: <span class="text-danger">*</span></label>

        <select class="form-control" id="cat_id" name="cat_id" value="{{old('cat_id')}}">
           @foreach ($data as $d)
            <option value="{{$d->id}}">{{$d->catname}}</option>
           @endforeach
        </select>
    </div>

    
        <div class="form-group mb-3">
            <select  id="country-dropdown" class="form-control">
                <option value="">-- Select Country --</option>
                @foreach ($countries as $data)
                <option value="{{$data->id}}">
                    {{$data->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <select id="state-dropdown" class="form-control">
            </select>
        </div>
        <div class="form-group">
            <select id="city-dropdown" class="form-control">
            </select>
        </div>


    <div class="mb-3">
        <label for="image">Choose Product: <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image" name="image[]" accept="image/*" onchange="previewImages(event)" multiple>
        <div id="image-preview-container" class="image-previews"></div>
        <span class="text-danger" id="image-error"></span>
    </div>

    <script>
        function previewImages(event) {
            // event.predefault();
            var input = event.target;
            var previewContainer = document.getElementById('image-preview-container');
            previewContainer.innerHTML = '';

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var previewImage = document.createElement('img');
                        previewImage.src = e.target.result;
                        previewImage.style.maxWidth = '200px';
                        previewImage.style.marginTop = '10px';

                        previewContainer.appendChild(previewImage);
                    };

                    reader.readAsDataURL(input.files[i]);
                }

                previewContainer.style.display = 'block';
            } else {
                document.getElementById('image-error').innerText = 'Error previewing images.';
                previewContainer.style.display = 'none';
            }
        }
    </script>


</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {

/*------------------------------------------
--------------------------------------------
Country Dropdown Change Event
--------------------------------------------
--------------------------------------------*/
$('#country-dropdown').on('change', function () {
var idCountry = this.value;
$("#state-dropdown").html('');
$.ajax({
    url: "{{url('api/fetch-states')}}",
    type: "POST",
    data: {
        country_id: idCountry,
        _token: '{{csrf_token()}}'
    },
    dataType: 'json',
    success: function (result) {
        $('#state-dropdown').html('<option value="">-- Select State --</option>');
        $.each(result.states, function (key, value) {
            $("#state-dropdown").append('<option value="' + value
                .id + '">' + value.name + '</option>');
        });
        $('#city-dropdown').html('<option value="">-- Select City --</option>');
    }
});
});

/*------------------------------------------
--------------------------------------------
State Dropdown Change Event
--------------------------------------------
--------------------------------------------*/
$('#state-dropdown').on('change', function () {
var idState = this.value;
$("#city-dropdown").html('');
$.ajax({
    url: "{{url('api/fetch-cities')}}",
    type: "POST",
    data: {
        state_id: idState,
        _token: '{{csrf_token()}}'
    },
    dataType: 'json',
    success: function (res) {
        $('#city-dropdown').html('<option value="">-- Select City --</option>');
        $.each(res.cities, function (key, value) {
            $("#city-dropdown").append('<option value="' + value
                .id + '">' + value.name + '</option>');
        });
    }
});
});

});
</script>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
