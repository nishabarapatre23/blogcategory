{{-- <h1>Blogs in Category: {{ $category->catname }}</h1> --}}

@if ($category)
    @foreach ($category as $blog)
        <div class="card">
            <div class="card-header">{{ $blog->name }}</div>
            <div class="card-body">

                @php
                $imageArray = explode('|', $blog->images);
            @endphp

                    <a href="#!"><img class="card-img-top" src="{{asset('upload/blog/'.$imageArray[0])}}" style="width: 500px;" alt="no image" /></a>

                <div class="card-body">
                    <div class="small text-muted">{{$blog->created_at}}</div>
                    <h2 class="card-title">{{$blog->name}}</h2>
                    <p class="card-text">{{$blog->cname}}</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>

            </div>
        </div>
    @endforeach
@else
    <p>No blogs available in this category.</p>
@endif
