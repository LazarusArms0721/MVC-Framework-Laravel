@extends ('layouts.app')

@section ('title', 'Blog')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 blog-container">
        <h1>Blog page</h1>

        @foreach ($blogs as $blog)
          <div class="blog">
            <h4>{{$blog->title}}</h4>
            <p>{{$blog->assignment['name']}}</p>
            {{--<p>{{$blog->text }}</p>--}}
            {{--<img src="{{$blog->assignment_image}}" alt="">--}}
          </div>
        @endforeach

        @if (Auth::check())
            <a href="/blog/create">
                <button>Create Blog Post</button>
            </a>
        @endif

    </div>

@endsection

