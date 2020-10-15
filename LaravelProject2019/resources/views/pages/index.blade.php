@extends ('layouts.app')

@section ('title', 'Homepage')

@section('stylesheets')


@endsection

@section ('content')

    <div class="jumbotron" style="background-color:#2d2d2d; margin-top: 25px;">
        <h1 class="display-4">Portfolio: Erhan Akin</h1>
        <p class="lead">Welcome! Instead of showing a boring resumé, I decided to make this website dedicated to all the projects I have worked on.</p>
        <p class="lead">As a (front end) developer, I am mainly focussing on a diverse set of tasks that range from designing to actually building functional websites and services</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="/assignments" role="button">See Assignments</a>
    </div>


    <div class="block-container">

        <h1>Latest activity</h1>

        <div class="left-block">
            <h1>{{$latestAssignment['name']}}</h1>
            <p>{{$latestAssignment['assignment_text']}}</p>
            <p>{{$latestAssignment['created_at']}}</p>
            <p>{{$latestAssignment['assignment_image']}}</p>
            {{--<img class="latest_assignment_image" src="{{asset('storage/assignment_images1').'/'.$latestAssignment->assignment_image }}" alt="">--}}
            <a href="/blog-filter?assignment_id={{$latestAssignment['id']}}" class="btn btn-primary ">
                Blogposts
            </a>
        </div>

        <div class="right-block">
            <h1>{{$latestBlog['title']}}</h1>
            <p>{{$latestBlog['text']}}</p>
            <p>{{$latestBlog['created_at']}}</p>
            <div class="button-group">
                <a href="/blog/{{$latestBlog['id']}}/single" class="btn btn-primary">
                    Read More
                </a>
            </div>
        </div>
    </div>

@endsection

