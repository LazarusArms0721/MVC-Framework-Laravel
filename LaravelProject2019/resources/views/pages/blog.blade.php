@extends ('layouts.app')

@section ('title', 'Blog')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 blog-container">
        <h1>Blog page</h1>

        <form action="/blog-filter?assignment_id=" method="GET">
            @csrf
            <label for="assignment_id">Search blog by Assignment category</label>
            <select name="assignment_id" id="assignment_id">
                @foreach ($assignments as $assignment)
                    <option value="{{$assignment->id}}">{{$assignment->name}}</option>
                @endforeach
            </select>
            <button action="submit">Search</button>
        </form>

        @foreach ($blogs as $blog)
          <div class="blog">
            <h4>{{$blog->title}}</h4>
            <p>{{$blog->assignment['name']}}</p>
            <p>{{$blog->text }}</p>
            {{--<img src="{{$blog->assignment_image}}" alt="">--}}
            <p>{{$blog->created_at->todatestring()}}</p>
          </div>
        @endforeach

        @if (Auth::check())
            <a href="/blog/create">
                <button>Create Blog Post</button>
            </a>
        @endif

    </div>

@endsection


