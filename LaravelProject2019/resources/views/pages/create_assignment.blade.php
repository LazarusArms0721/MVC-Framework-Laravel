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

                <button type="sumbit" class="btn btn-success btn-block mt-3">Create Assignment</button>

            </form>
        </div>
    </div>

@endsection

