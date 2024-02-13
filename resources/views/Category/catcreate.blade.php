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
        <h2>CATEGORY</h2>

        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="catname">Category Name: <span class="text-danger">*</span></label>
                <input type="text" name="catname" id="catname" class="form-control" placeholder="Enter Category" value="{{ old('catname') }}" required>
                <span class="text-danger">@error('catname'){{ $message }}@enderror</span>
            </div>

            <div class="form-group">
                <label>Status: <span class="text-danger">*</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_active" value="active" checked>
                    <label class="form-check-label" for="status_active">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive">
                    <label class="form-check-label" for="status_inactive">Inactive</label>
                </div>
                <span class="text-danger">@error('status'){{ $message }}@enderror</span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
