@extends ('layouts.app')

@section ('title', 'Blog')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 blog-container">
        <h1>Blog</h1>

        @if(Auth::check())
            @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
                <a href="/blog/create" class="btn btn-primary">
                    Create Blogpost
                </a>
            @endif
        @endif

        <div class="row">
            <form action="/blog-filter?assignment_id=" method="GET" class="mb-1">
                @csrf
                <label for="assignment_id">Search blog by Assignment category</label>
                <select name="assignment_id" id="assignment_id">
                    @foreach ($assignments as $assignment)
                        <option value="{{$assignment->id}}">{{$assignment->name}}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-info" action="submit">Search</button>
            </form>
            <a onclick="showCalendar()" class="btn btn-outline-secondary mb-1 ml-1">
                <i class="fas fa-calendar-alt"></i>
            </a>
        </div>



        <div class="row" id="form-hidden">
            <form class="form-inline" action="/date-filter">

                {{csrf_field()}}
                <div class="form-group mb-2">
                    <label class="mr-2" for="date">Filter by date</label>
                    <input name="startdate" class="date form-control mr-2" type="text">
                    <input name="enddate" class="date form-control" type="text">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button class="btn btn-outline-info">Submit</button>
                </div>
            </form>
        </div>



        @foreach ($blogs as $blog)
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
        @endforeach


        <div class="row">
            <div class="col-12 text-center">
                {{ $blogs->links() }}
            </div>
        </div>

        @if(Auth::check())
            @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
                <a href="/blog/create" class="btn btn-primary btn-lg">
                    Create Blog Post
                </a>
            @endif
        @endif

    </div>


@section('scripts')
    <script>


        function showCalendar() {
            var x = document.getElementById("form-hidden");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        };


       $('.date').datepicker({
           format: 'yyyy-mm-dd'
       });

       $('.date-2').datepicker({
           format: 'yyyy-mm-dd'
       });

       $('.date').datepicker('update', new Date());



       $(document).ready(function(){
           $("date").datepicker();
       });

    </script>

@endsection

@endsection


