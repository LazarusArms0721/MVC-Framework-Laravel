@extends ('layouts.app')

@section ('title', 'Assignments')

@section('stylesheets')


@endsection

@section ('content')




    <div class="col-md-8 offset-2 assignments-container">

    <h1>Assignments Page</h1>



        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
        <a href="/assignments/create" class="btn btn-primary">
            Create Assignment
        </a>
    @endif


    @foreach($assignments as $assignment)
        <div class="assignment">
            <h1>{{$assignment->name}}</h1>
            <p>{{$assignment->assignment_text}}</p>
            <img class="assignment_image" src="{{asset('storage/assignment_images1').'/'.$assignment->assignment_image }}" alt="">



            <div class="button-group">
                <a href="/blog-filter?assignment_id={{$assignment->id}}" class="btn btn-primary ">
                    Blogposts
                </a>

                @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_EDITOR))
                    <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-secondary">
                        Assignment aanpassen
                    </a>
                @endif
            </div>

        </div>
    @endforeach

        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
    <a href="/assignments/create" class="btn btn-primary btn-lg">
        Assignment aanmaken
    </a>
    @endif

    </div>

@endsection

