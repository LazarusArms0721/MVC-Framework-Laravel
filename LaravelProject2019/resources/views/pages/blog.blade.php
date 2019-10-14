@extends ('layouts.app')

@section ('title', 'Blog')

@section('stylesheets')


@endsection

@section ('content')

    <h1>Blog page</h1>

    @foreach ($blogs as $blog)
        <h1> {{$blog->title}}</h1>
        <p> {{ $blog->assignment_id }}</p>
        <p> {{$blog->text }}</p>
    @endforeach

    <a href="/blog/create">
        <button>Create Blog Post</button>
    </a>

@endsection

