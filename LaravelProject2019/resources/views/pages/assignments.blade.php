@extends ('layouts.app')

@section ('title', 'Assignments')

@section('stylesheets')


@endsection

@section ('content')




    <div class="col-md-8 offset-2 assignments-container">

    <h1>Assignments Page</h1>

    <form action="assignment-filter?assignment_id=" method="POST">
        @csrf
        <label for="assignment_id">Choose assignment:</label>
        <select name="assignment_id" id="assignment_id">
            @foreach ($assignments as $assignment)
                <option value="{{$assignment->id}}">{{$assignment->name}}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-info" action="submit">Search</button>

        @if (Auth::check())
            <a href="/blog/create" class="btn btn-primary">
                Create Assignment
            </a>
        @endif
    </form>

    @foreach($assignments as $assignment)
        <div class="assignment">
            <h1>{{$assignment->name}}</h1>
            <p>{{$assignment->assignment_text}}</p>
            <img class="assignment_image" src="{{asset('storage/assignment_images1').'/'.$assignment->assignment_image }}" alt="">
            <div class="button-group">
                <a href class="btn btn-primary ">
                    Blogposts
                </a>

                @if (Auth::check())
                    <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-secondary">
                        Assignment aanpassen
                    </a>
                @endif
            </div>

        </div>
    @endforeach

    @if (Auth::check())
    <a href="/assignments/create" class="btn btn-primary btn-lg">
        Assignment aanmaken
    </a>
    @endif

    </div>

@endsection

