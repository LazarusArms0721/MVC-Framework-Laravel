@extends ('layouts.app')

@section ('title', 'Assignments')

@section('stylesheets')


@endsection

@section ('content')




    <div class=" assignments-container">

    <h1>Assignments</h1>

    @if(Auth::check())
        @if (Auth()->user()->hasRole(App\Role\Userrole::ROLE_ADMIN))
        <a href="/assignment/create" class="btn btn-primary">
            Create Assignment
        </a>
        @endif
    @endif

    <div class="row">

    {{--@foreach($assignments as $assignment)--}}
        {{--<div class="assignment">--}}

            {{--<div class="left-side">--}}
                {{--<h1>{{$assignment->name}}</h1>--}}
                {{--<p>{{$assignment->assignment_text}}</p>--}}
                {{--<div class="bpos button-group">--}}
                    {{--<a href="/assignments/{{$assignment->id}}" class="btn btn-primary">--}}
                        {{--Read More--}}
                    {{--</a>--}}

                    {{--<a href="/blog-filter?assignment_id={{$assignment->id}}" class="btn btn-secondary">--}}
                        {{--Blogposts--}}
                    {{--</a>--}}

                    {{--@if (Auth::check())--}}
                        {{--@if(Auth()->user()->hasRole(App\Role\UserRole::ROLE_EDITOR))--}}
                            {{--<a href="/assignments/{{$assignment->id}}/edit" class="btn btn-outline-secondary">--}}
                                {{--Assignment aanpassen--}}
                            {{--</a>--}}
                        {{--@endif--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="right-side">--}}
                {{--<img class="assignment_image" src="{{asset('storage/assignment_images1').'/'.$assignment->assignment_image }}" alt="">--}}
            {{--</div>--}}




        {{--</div>--}}
    {{--@endforeach--}}

    @foreach($assignments as $assignment)

        <div class="col-md-4 assignment-block">
            <a href="/assignments/{{$assignment->id}}">
                <img class="image_block" src="{{asset('storage/assignment_images1').'/'.$assignment->assignment_image }}" alt="">
            </a>
            <div class="content_block">
                <h3>{{$assignment->name}}</h3>
                <p>{{$assignment->assignment_text}}</p>

            </div>
            <div class="button-group">
                <a href="/assignments/{{$assignment->id}}" class="btn btn-primary">
                    Read More
                </a>

                <a href="/blog-filter?assignment_id={{$assignment->id}}" class="btn btn-secondary">
                    Blogposts
                </a>

                @if (Auth::check())
                    @if(Auth()->user()->hasRole(App\Role\Userrole::ROLE_EDITOR))
                        <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-outline-secondary">
                            Edit
                        </a>
                    @endif
                @endif
            </div>
        </div>


    @endforeach
    </div>

    <div class="row">
        <div class="col-12 text-center">
            {{ $assignments->links() }}
        </div>
    </div>


    @if (Auth::check())
        @if (Auth()->user()->hasRole(App\Role\Userrole::ROLE_ADMIN))
        <a href="/assignments/create" class="btn btn-primary btn-lg">
            Assignment aanmaken
        </a>
        @endif
    @endif

    </div>

@endsection

