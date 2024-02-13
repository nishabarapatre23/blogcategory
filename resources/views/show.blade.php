<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Show Product</title>
</head>
<body>
    <div class="container">
        <h2 style="color: #3498db;">View Records</h2>
        <br><br>

    {{-- <div class="mb-3 mt-3">
        <label for="name">Product Name:</label>
        <input type="text" id="name" value="{{ $data->name }}" readonly>
    </div>

    <div class="mb-3">
        <label for="cname">Description:</label>
        <input type="text" id="cname" value="{{ $data->cname }}" readonly>
    </div>

    <div class="mb-3">
        <label for="cat_id">Category:</label>
        <input type="text" id="cat_id" value="{{ $data->category->catname }}" readonly>
    </div>


    <div class="mb-3">
        <label for="image">Product Image:</label>
        @if ($data->image)
            <img src="{{ asset('images/' . $data->image) }}" alt="Product Image" style="max-width: 200px; margin-top: 10px;">
        @else
            <span>No image available</span>
        @endif
    </div> --}}


<div>
    <h3>{{ $form->name }}</h3>
    <p>{{ $form->cname }}</p>
    @if($form->images)
        @php
            $images = explode('|', $form->images);
        @endphp
        @foreach($images as $image)
            <img src="{{ asset('upload/blog/' . $image) }}" alt="Image" height="200px" width="200px">
        @endforeach
    @endif
</div>


    <a href="{{ route('table') }}" class="btn btn-secondary">Back to Product List</a>

</div>
</body>
</html>
