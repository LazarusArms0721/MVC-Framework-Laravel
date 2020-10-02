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

            @if (Auth::check())
                <a href="/blog/create" class="btn btn-primary">
                    Create Blogpost
                </a>
            @endif
        </form>

        @foreach ($blogs as $blog)
          <div class="blog">
            <h4>{{$blog->title}}</h4>
            <p>{{$blog->assignment['name']}}</p>
            <p>{{$blog->text }}</p>
            {{--<img src="{{$blog->assignment_image}}" alt="">--}}
            <p>{{$blog->created_at->todatestring()}}</p>
            <p>Written by {{$blog->user['name']}}</p>


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

        @if (Auth::check())
            <a href="/blog/create" class="btn btn-primary btn-lg">
                Create Blog Post
            </a>
        @endif

    </div>

@endsection


