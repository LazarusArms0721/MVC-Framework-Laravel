@extends ('layouts.app')

@section ('title', 'Create Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Update Blog post</h1>
            <hr>
            <form method="POST" action="/blog/{{$blog->id}}/update" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type = "hidden" name = "_method" value = "put">

                <label for="assignment_id">Assignment:</label>
                <select name="assignment_id" id="assignment_id">
                    @foreach ($assignments as $assignment)
                        <option value="{{ $assignment->id}}"> {{$assignment->name}}</option>
                    @endforeach
                </select>
                <br>
                <p>Current Assignment Category {{$blog->assignment['name']}}</p>


                <label for="title">Blogpost Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $blog->title; ?>">

                <label for="text">Blogpost Text</label>
                <textarea rows="10" name="text" class="form-control"><?php echo $blog->text; ?></textarea>

                <button type="submit" class="btn btn-success mt-3">Update Blogpost</button>

                @if (Auth::check())
                    <a href="/blog/{{$blog->id}}/delete" class="btn btn-outline-danger mt-3 ">
                        Delete Assignment
                    </a>
                @endif

            </form>
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