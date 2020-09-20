@extends ('layouts.app')

@section ('title', 'Blog')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 blog-container">
        <h1>Blog page</h1>

        <form action="/blog-filter?assignment_id=" method="GET">
            @csrf
            <label for="assignment_id">Search blog by Assignment category</label>
            <select name="assignment_id" id="assignment_id">
                @foreach ($assignments as $assignment)
                    <option value="{{$assignment->id}}">{{$assignment->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-info" action="submit">Search</button>
        </form>

        @foreach ($blogs as $blog)
          <div class="blog">
            <h4>{{$blog->title}}</h4>
            <p>{{$blog->assignment['name']}}</p>
            <p>{{$blog->text }}</p>
            {{--<img src="{{$blog->assignment_image}}" alt="">--}}
            <p>{{$blog->created_at->todatestring()}}</p>


              <div class="button-group">
                  <a href class="btn btn-primary ">
                      Read More
                  </a>

                  @if (Auth::check())
                      <a href="" class="btn btn-secondary">
                          Blog aanpassen
                      </a>
                  @endif
              </div>
          </div>
        @endforeach

        @if (Auth::check())
            <a href="/blog/create" class="btn btn-primary btn-lg">
                Create Blog Post
            </a>
        @endif

    </div>

@endsection


