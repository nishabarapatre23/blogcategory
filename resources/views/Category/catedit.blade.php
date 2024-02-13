<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .container {width: 600px; margin-top: 50px}
    </style>
</head>
<body>
     <div class="container">
        <h2>Category Update</h2><br>
        <form action="{{route('category.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="catname">Category Name:</label>
               <input type="text" name="catname" id="catname" class="form-control" value="{{$data->catname}}">
            </div>
            <div class="form-group">
                <label>Status: <span class="text-danger">*</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_active" value="{{$data->status}}" checked>
                    <label class="form-check-label" for="status_active">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="{{$data->status}}">
                    <label class="form-check-label" for="status_inactive">Inactive</label>
                </div>
                <span class="text-danger">@error('status'){{ $message }}@enderror</span>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
     </div>
</body>
</html>
