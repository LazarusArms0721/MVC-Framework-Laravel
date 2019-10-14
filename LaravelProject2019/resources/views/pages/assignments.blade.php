@extends ('layouts.app')

@section ('title', 'Assignments')

@section('stylesheets')


@endsection

@section ('content')

    <h1>Assignments Page</h1>

    @foreach($assignments as $assignment)
        <h4>{{ $assignment->name }}</h4>
    @endforeach


    @if (Auth::check())
    <a href="/assignments/create">
        <button>Create Assignment</button>
    </a>
    @endif


@endsection

