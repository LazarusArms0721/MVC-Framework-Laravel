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
                <?php $notifications = auth()->user()->unreadNotifications; ?>
                <div class="dropdown">
                    <button class="btn ddb-button btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-danger">{{$notifications->count()}}</span>
                    </button>
                    <div class="dropdown-menu ddm-ads bg-dark" aria-labelledby="dropdownMenuButton">

                        @forelse($notifications as $notification)
                            <div class="notification-card">
                                <p style="color: #fff !important;">New Contact Form submission by {{$notification->data['name']}} at {{$notification->created_at}}
                                    <br>
                                    {{$notification->data['email']}}
                                    <br>
                                    <a class="mark-as-read" href="#" data-id="{{$notification->id}}">Mark as read</a>
                                </p>
                            </div>
                            @if($loop->last)
                                    <a href="#" id="mark-all">
                                        Mark all as read
                                    </a>
                            @endif
                        @empty
                                <p style="color: #fff !important; text-align: center">There are no new notifications.</p>
                        @endforelse


                    </div>
                </div>
            @endif

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </button>
                <div class="dropdown-menu ddm-pf bg-dark" aria-labelledby="dropdownMenuButton">
                    @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
                        <a class="dropdown-item text-white" href="/dashboard/contact"><i class="far fa-envelope"></i> Submissions</a>
                    @endif
                    <a class="dropdown-item text-white" href="/dashboard/user"><i class="fas fa-user"></i> Profile</a>
                    <a class="dropdown-item text-white" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
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


    @if(Auth::check())
        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
            <script>

                console.log('hello');
                function sendMarkRequest(id = null){
                    return $.ajax("/notifications/read", {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        data: id,
                    });
                }

                $(function() {
                    $('.mark-as-read').click(function() {
                        let request = sendMarkRequest($(this).data('id'));

                        console.log("hoi");

                        request.done(() => {
                           $(this).parents('div.notification-card').remove();
                        });
                    });

                    $('#mark-all').click(function(){
                        let request = sendMarkRequest();

                        request.done(() => {
                          $('div.notification-card').remove();
                        });
                    });


                });

            </script>
        @endif
    @endif
