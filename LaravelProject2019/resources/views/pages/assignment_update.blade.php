@extends ('layouts.app')

@section ('title', 'Update Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Update Assignment</h1>
            <hr>
            <form method="POST" action="/assignments/{{$assignment->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type = "hidden" name = "_method" value = "put">


                <label for="name">Assignment Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $assignment->name; ?>">

                <label for="assignment_text">Assignment Text</label>
                <textarea rows="10" name="assignment_text" class="form-control"><?php echo $assignment->assignment_text; ?></textarea>

                <label for="assignment_image">Select image to upload:</label>
                <input type="file" name="assignment_image" class="form-control" value="<?php echo $assignment->assignment_image; ?>">{{$assignment->assignment_image}}</input>

                <button type="submit" class="btn btn-success mt-3">Update Assignment</button>

                @if (Auth::check())
                    <a href="/assignments/{{$assignment->id}}/delete" class="btn btn-outline-danger mt-3 ">
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