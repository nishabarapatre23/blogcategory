<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('table')}}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('category.table')}}">Category</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">

            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        @php

                        $imageArray = explode('|', $data1->images);
                    @endphp

                            <a href="#!"><img class="card-img-top" src="{{asset('upload/blog/'.$imageArray[0])}}" style="width: 500px;" alt="no image" /></a>


                        <div class="card-body">
                            <div class="small text-muted">{{$data1->created_at}}</div>
                            <h2 class="card-title">{{$data1->name}}</h2>
                            <p class="card-text">{{$data1->cname}}</p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">

                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        @foreach ($blog as $b)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            {{-- @dd($b->images) --}}
                            <div class="card mb-4">
{{-- @dd($b) --}}
@php

$imageArray = explode('|', $b->images);
@endphp
     <a href="#!"><img class="card-img-top" src="{{asset('upload/blog/'.$imageArray[0])}}" style="width: 300px;" alt="no image" /></a>


                                <div class="card-body">
                                    <div class="small text-muted">{{$b->created_at}}</div>
                                    <h2 class="card-title h4">{{ $b->name }}</h2>
                                    <p class="card-text">{{ $b->cname }}</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>

                                </div>
                            </div>
                            <!-- Blog post-->

                        </div>
                        @endforeach

                    </div>
                    <!-- Your dynamic content here -->

<div class="row">
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">

            {{-- Previous Page Link --}}
            <li class="page-item {{ $blog->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $blog->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $blog->onFirstPage() ? 'true' : 'false' }}">Newer</a>
            </li>

            {{-- Pagination Elements --}}
            @for ($i = 1; $i <= $blog->lastPage(); $i++)
                <li class="page-item {{ $blog->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $blog->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            <li class="page-item {{ $blog->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $blog->nextPageUrl() }}">Older</a>
            </li>
        </ul>
    </nav>
</div>

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                   <!-- Categories widget-->
<div class="row">
    <div class="col-sm-6">
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    @foreach ($data as $category)
                        <li><a href="{{ route('blogs.category', ['id' => $category->id]) }}">{{ $category->catname }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card mb-4">
            <div class="card-header">Status</div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    @foreach ($data as $category)
                        <li>
                            <a href="#!" class="{{ $category->status === 'active' ? 'text-success' : 'text-primart' }}">
                                ({{ ucfirst($category->status) }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>



                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
