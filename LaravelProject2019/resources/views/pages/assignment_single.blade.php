@extends ('layouts.app')

@section ('title', 'Create Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="assignment">
        <h4>{{$assignment->name}}</h4>
        <p>{{$assignment->assignment_text}}</p>
        <img class="assignment_image" src="{{asset('storage/assignment_images1').'/'.$assignment->assignment_image }}" alt="">
        {{--<p class="author-name">Written by {{$assignment->user['name']}} on {{$blog->created_at->todatestring()}}</p>--}}


        <div class="button-group">

            @if (Auth::check())
                <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-secondary">
                    Assignment aanpassen
                </a>
            @endif
            <a href="/assignments" class="btn btn-secondary">
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