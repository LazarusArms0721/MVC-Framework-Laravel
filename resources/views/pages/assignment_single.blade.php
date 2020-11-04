@extends ('layouts.app')

@section ('title', 'Assignment')

@section('stylesheets')


@endsection

@section ('content')









    <!-- Fusce, Section 4 -->

    <div class="blog">
        <div
                class="col-md-12 col-lg-6 tm-section-image-container tm-img-right-container" style="background-color: #2D2D2D; padding-left: 0px; padding-right:0px;"
        >
            {{--<img--}}
            {{--src="https://img2.pngio.com/superintendent-resumes-pittsburgh-schools-groups-pull-support-superintendent-png-368_366.png"--}}
            {{--alt="Image"--}}
            {{--class="img-fluid tm-img-right"--}}
            {{--/>--}}
            <img src="{{asset('storage/assignment_images1').'/'.$assignment->assignment_image }}" alt="Image" class="img-fluid tm-img-right" />
        </div>
        <h4>{{$assignment->name}}</h4>
        <p>{{$assignment->assignment_text}}</p>
        <p></p>
        {{--<img src="{{$blog->assignment_image}}" alt="">--}}
        <p class="author-name">Written on {{$assignment->created_at->format('d-m-Y')}}</p>


        <div class="button-group">

            @if (Auth::check())
                <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-outline">
                    Assignment aanpassen
                </a>
            @endif
            <a href="/blog-filter?assignment_id={{$assignment->id}}" class="btn btn-primary">See all blogposts</a>
            <a href="/assignments" class="btn btn-outline-secondary">
                Return
            </a>

        </div>
    </div>
    

    @if(count($blogs) > 0)

        <h1 class="mt-3">Latest blogposts for this assignment</h1>
    @endif

    @forelse ($blogs as $blog)
        <div class="blog">
            <h4>{{$blog->title}}</h4>
            <a href="/blog-filter?assignment_id={{$blog->assignment_id}}">{{$blog->assignment['name']}}</a>
            <p>{{$blog->text }}</p>

            <p class="author-name">Written by {{$blog->user['name']}} on {{$blog->created_at->format('d-m-Y H:i')}}</p>


            <div class="button-group">
                <a href="/blog/{{$blog->id}}/single" class="btn btn-primary">
                    Read More
                </a>

                @if (Auth::check())
                    <a href="/blog/{{$blog->id}}/edit" class="btn btn-secondary">
                        Blogpost aanpassen
                    </a>
                @endif
            </div>
        </div>

    @empty
        <h1 class="mt-3">No blogposts yet.</h1>
    @endforelse










{{--@if($errors->any())--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-6 offset-sm-3">--}}
                {{--<ul>--}}
                    {{--@foreach($errors->all() as $error)--}}
                        {{--<li>{{$error}}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

@endsection