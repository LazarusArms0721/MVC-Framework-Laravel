@extends ('layouts.app')

@section ('title', 'Create Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="blog">
        <h4>{{$blog->title}}</h4>
        <p>{{$blog->assignment['name']}}</p>
        <p>{{$blog->text}}</p>
        {{--<img src="{{$blog->assignment_image}}" alt="">--}}
        <p class="author-name">Written by {{$blog->user['name']}} on {{$blog->created_at->todatestring()}}</p>


        <div class="button-group">

            @if (Auth::check())
                <a href="/blog/{{$blog->id}}/edit" class="btn btn-secondary">
                    Blogpost aanpassen
                </a>
            @endif
            <a href="/blog" class="btn btn-secondary">
                Return
            </a>

        </div>
    </div>


    @if($errors->any())
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

@endsection