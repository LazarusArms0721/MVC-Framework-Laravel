@extends ('layouts.app')

@section ('title', 'Homepage')

@section('stylesheets')


@endsection

@section ('content')

    <div class="jumbotron mt-1" style="background-color:#2d2d2d;">
        <h1 class="display-4">Portfolio: Erhan Akin</h1>
        <h6 class="">Welcome! Instead of showing a boring resumé, I decided to make this website dedicated to all the projects I have worked on.</h6>
        <h6 class="">As a (front end) developer, I am mainly focussing on a diverse set of tasks that range from designing to actually building functional websites and services</h6>
        <hr class="my-4" style="color: #fff !important; border-color: #fff !important;">
        <h6>My assignments can range from building complex SaaS applications to simple Wordpress websites.</h6>
        <br>
        <a class="btn btn-primary" href="/assignments" role="button">See Assignments</a>
    </div>


    <div class="block-container mb-1">
        <h1>Latest actvity</h1>

        <div class="row">
        {{--<div class="left-block">--}}
            {{--<h1>{{$latestAssignment['name']}}</h1>--}}
            {{--<p>{{$latestAssignment['assignment_text']}}</p>--}}
            {{--<p>{{$latestAssignment['created_at']}}</p>--}}
            {{--<p>{{$latestAssignment['assignment_image']}}</p>--}}
            {{--<img class="latest_assignment_image" src="{{asset('storage/assignment_images1').'/'.$latestAssignment->assignment_image }}" alt="">--}}
            {{--<a href="/blog-filter?assignment_id={{$latestAssignment['id']}}" class="btn btn-primary ">--}}
                {{--Blogposts--}}
            {{--</a>--}}
        {{--</div>--}}
        <div class="col-md-4 left-block">
            <a href="/assignments/{{$latestAssignment->id}}">
                <img class="image_block" src="{{asset('storage/assignment_images1').'/'.$latestAssignment->assignment_image }}" alt="">
            </a>
            <div class="content_block">
                <h3>{{$latestAssignment->name}}</h3>
                <p>{{$latestAssignment->assignment_text}}</p>

            </div>
            <div class="button-group">
                <a href="/assignments/{{$latestAssignment->id}}" class="btn btn-primary">
                    Read More
                </a>

                <a href="/blog-filter?assignment_id={{$latestAssignment->id}}" class="btn btn-secondary">
                    Blogposts
                </a>

                @if (Auth::check())
                    @if(Auth()->user()->hasRole(App\Role\Userrole::ROLE_EDITOR))
                        <a href="/assignments/{{$latestAssignment->id}}/edit" class="btn btn-outline-secondary">
                            Edit
                        </a>
                    @endif
                @endif
            </div>
        </div>

        <div class="col-md-7 offset-1 right-block">
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
    </div>

@endsection

