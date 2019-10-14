@extends ('layouts.app')

@section ('title', 'Projects')

@section('stylesheets')


@endsection

@section ('content')

    <h1>Assignments Page</h1>

    @foreach($assignments as $assignment)
        <h1>{{ $assignment->name }}</h1>
    @endforeach

    <a href="/assignments/create">
        <button>Create Assignment</button>
    </a>


@endsection

