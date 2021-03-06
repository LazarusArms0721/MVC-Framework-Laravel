@extends ('layouts.app')

@section ('title', 'Blog')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 blog-container">
        <h1>Showing blogposts between {{$startdate}} and {{$enddate}}</h1>

        <form action="/blog-filter?assignment_id=" method="GET">
            @csrf
            {{--<label for="assignment_id">Search blog by Assignment category</label>--}}
            {{--<select name="assignment_id" id="assignment_id">--}}

            {{--@foreach ($assignments as $assignment)--}}
            {{--<option value="{{$assignment->id}}">{{$assignment->name}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--<button action="submit">Search</button>--}}

            @if (Auth::check())
                @if (Auth()->user()->hasRole(App\Role\Userrole::ROLE_ADMIN))
                    <a href="/blog/create" class="btn btn-primary">
                        Create Blogpost
                    </a>
                @endif
            @endif

        </form>

        @foreach ($filteredblogs as $filteredblog)
            <div class="blog">
                <h4>{{$filteredblog->title}}</h4>
                <a href="/blog-filter?assignment_id={{$filteredblog->assignment_id}}">{{$filteredblog->assignment['name']}}</a>
                <p>{{$filteredblog->assignment['name']}}</p>

                {{--<p>{{$blog->text }}</p>--}}
                {{--<img src="{{$blog->assignment_image}}" alt="">--}}
                <p class="author-name">Written by {{$filteredblog->user['name']}} on {{$filteredblog->created_at->format('d-m-Y H:i')}}</p>

                <div class="button-group">
                    <a href="/blog/{{$filteredblog->id}}/single" class="btn btn-primary">
                        Read More
                    </a>

                    @if (Auth::check())
                        @if(Auth()->user()->hasRole(App\Role\Userrole::ROLE_EDITOR))
                            <a href="/blog/{{$filteredblog->id}}/edit" class="btn btn-secondary">
                                Blogpost aanpassen
                            </a>
                        @endif
                    @endif
                </div>
            </div>

        @endforeach

        <a href="/blog" class="btn btn-secondary">
            Return to overview
        </a>

    </div>

@endsection