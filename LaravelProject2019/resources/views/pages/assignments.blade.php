@extends ('layouts.app')

@section ('title', 'Assignments')

@section('stylesheets')


@endsection

@section ('content')

    <h1>Assignments Page</h1>

    @foreach($assignments as $assignment)
        <h4>{{$assignment->name}}</h4>
        <p>{{$assignment->assignment_text}}</p>
        <img src="{{ asset($assignment->assignment_image)}}" alt="">
    @endforeach

    @if (Auth::check())
    <a href="/assignments/create">
        <button>Create Assignment</button>
    </a>
    @endif


@endsection

