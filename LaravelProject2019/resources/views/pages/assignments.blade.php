@extends ('layouts.app')

@section ('title', 'Assignments')

@section('stylesheets')


@endsection

@section ('content')




    <div class="col-md-8 offset-2 assignments-container">

    <h1>Assignments Page</h1>

    <form action="filter-assignment?assignment_id=" method="POST">
        @csrf
        <label for="assignment_id">Choose assignment:</label>
        <select name="assignment_id" id="assignment_id">
            @foreach ($assignments as $assignment)
                <option value="{{$assignment->id}}">{{$assignment->name}}</option>
            @endforeach
        </select>
        <button action="submit">Search</button>
    </form>

    @foreach($assignments as $assignment)
        <div class="assignment">
            <h1>{{$assignment->id}}</h1>
            <h4>{{$assignment->name}}</h4>
            <p>{{$assignment->assignment_text}}</p>
            <img class="assignment_image" src="{{asset('storage/assignment_images1').'/'.$assignment->assignment_image }}" alt="">
            <div class="assignment-button">
                <button>Blogposts</button>
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

