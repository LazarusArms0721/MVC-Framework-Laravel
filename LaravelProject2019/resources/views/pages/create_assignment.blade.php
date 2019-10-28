@extends ('layouts.app')

@section ('title', 'Create Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Create Assignment</h1>
            <hr>
            <form method="POST" action="/assignment-action">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="name">Assignment Name</label>
                <input type="text" name="name" class="form-control">

                <label for="assignment_text">Assignment Text</label>
                <textarea name="assignment_text" class="form-control" placeholder="Enter text here..."></textarea>

                <label for="assignment_image">Select image to upload:</label>
                <input type="file" name="assignment_image" class="form-control">

                <button type="sumbit" class="btn btn-success btn-block mt-3">Create Assignment</button>

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

