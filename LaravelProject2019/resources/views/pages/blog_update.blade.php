@extends ('layouts.app')

@section ('title', 'Create Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Update Blog post</h1>
            <hr>
            <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type = "hidden" name = "_method" value = "put">

                <label for="assignment_id">Assignment:</label>
                <select name="assignment_id" id="assignment_id">
                    @foreach ($assignments as $assignment)
                        <option value="{{ $assignment->id}}"> {{$assignment->name}}</option>
                    @endforeach
                </select>

                <label for="name">Blogpost Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $blog->title; ?>">

                <label for="assignment_text">Blogpost Text</label>
                <textarea name="assignment_text" class="form-control"><?php echo $blog->text; ?></textarea>

                <button type="sumbit" class="btn btn-success btn-block mt-3">Update Blogpost</button>

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