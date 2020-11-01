@extends ('layouts.app')

@section ('title', 'Assignment')

@section('stylesheets')


@endsection

@section ('content')





    <!-- Logo & Intro -->
    <section id="logo" class="tm-section-logo mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="background-color: #FF3D00 !important;">
                    <h1 class="text-uppercase tm-text-primary tm-site-name">
                        <span style="">///</span>Assignment<span style="color: #000 !important;">///</span>
                    </h1>
                    <p class="tm-text-primary tm-site-description">
                        Erhan Akin
                    </p>

                </div>
                <div class="col-sm-12 offset-sm-0 col-md-6" style="background-color: #FFF !important;">
                    <div class="tm-site-name-container">
                        <div class="tm-site-name-container-inner">
                            <h1 style="color: #000 !important; font-size: 4rem !important; line-height: 1.4 !important; margin-bottom: 0px !important;">///</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro -->
    <section id="intro" class="tm-p-1-section-1" style="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="background-color:#FFF !important;">
                    <div class="tm-section-text-container">
                        <p style="color: #000; margin-bottom:0px; line-height: 2;">{{$assignment->created_at->format('d-m-Y')}}</p>
                    </div>
                </div>
                <div class="col-md-6" style="background-color: #FF3D00;">

                    <h5 class="text-uppercase tm-text-primary tm-site-name">
                        <span style="color: #000 !important;">///</span>Assignment_IMAGE<span style="color: #000 !important;">///</span>
                    </h5>
                </div>
            </div>
        </div>
    </section>


    <!-- Fusce, Section 4 -->
    <section id="section_4" class="tm-section-4">
        <div class="container-fluid">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-md-12 col-lg-6 tm-text-left-container" style="background-color: #2D2D2D !important; padding-top: 10px; padding-bottom: 10px;">
                    <div class="tm-section-text-container-3 tm-bg-white-alpha h-100">
                        <h2 class="tm-text-accent tm-section-title-mb">
                            {{$assignment->name}}
                        </h2>
                        <p class="mb-0">
                            {{$assignment->assignment_text}}
                        </p>
                        <div style="position:absolute; bottom: 10px;">
                        @if (Auth::check())
                            <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-outline-danger">
                                Assignment aanpassen
                            </a>
                        @endif
                        <a href="/blog-filter?assignment_id={{$assignment->id}}" class="btn btn-danger">See all blogposts</a>
                        <a href="/assignments" class="btn btn-danger">
                            Return
                        </a>
                        </div>
                    </div>
                </div>
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
            </div>
        </div>
    </section>

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