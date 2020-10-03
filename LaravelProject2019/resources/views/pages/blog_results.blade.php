@extends ('layouts.app')

@section ('title', 'Blog')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 blog-container">
        <h1>Blog results</h1>

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

        @foreach ($filteredblogs as $filteredblog)
            <div class="blog">
                <h4>{{$filteredblog->title}}</h4>
                <p>{{$filteredblog->assignment['name']}}</p>

                {{--<p>{{$blog->text }}</p>--}}
                {{--<img src="{{$blog->assignment_image}}" alt="">--}}

                <div class="button-group">
                    <a href="/blog/{{$filteredblog->id}}/single" class="btn btn-primary">
                        Read More
                    </a>

                    @if (Auth::check())
                        <a href="/blog/{{$filteredblog->id}}/edit" class="btn btn-secondary">
                            Blogpost aanpassen
                        </a>
                    @endif
                </div>
            </div>

        @endforeach



    </div>

@endsection