<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 20px;">
    <a class="navbar-brand" href="{{route('pages.index')}}">Portfolio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('pages.index')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('pages.assignments')}}">Assignments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('pages.blog')}}">Blog</a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{route('pages.about')}}">About</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact.show')}}">Contact</a>
            </li>

            @if (Auth::check())

            @endif
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--Dropdown--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
            {{--</li>--}}
        </ul>
        <ul class="dropdown form-inline my-2 my-lg-0">
        @if (Auth::check())
            <li class="nav-item dashboard-showcase">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>

            @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                        <?php $notifications = auth()->user()->unreadNotifications; ?>
                        @foreach($notifications as $notification)
                            <p style="color: #fff !important;">New Contact Form entry by {{$notification->data['name']}} at {{$notification->created_at}} </p>
                            {{--<a class="nav-link" href="#">{{$notification->data['data']}}</a>--}}


                            {{$notification->data['email']}}


                        @endforeach


                    </div>
                </div>
            @endif

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </button>
                <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-white" href="/dashboard/user">Profile</a>
                    <a class="dropdown-item text-white" href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>


            {{--<button onclick="myFunction()" class="dropbtn">Menu</button>--}}
            {{--<div id="myDropdown" class="dropdown-content">--}}

                {{--<a href="/dashboard/user">{{ Auth::user()->name}}</a>--}}
            {{--</div>--}}






        @else
            <li><a href="{{ url('/login') }}"> Login </a></li>
        @endif


        </ul>
    </div>
</nav>