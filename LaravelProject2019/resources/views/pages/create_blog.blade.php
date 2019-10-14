@extends ('layouts.app')

@section ('Title', 'Contact Us')

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Create Blog</h1>
            <hr>
            <form method="POST" action="/blog-action">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="assignment_id">Assignment</label>
                <select name="assignment_id" id="assignment_id">
                    @foreach ($assignments as $assignment)
                        <option value="{{ $assignment->id }}"> {{$assignment->name}}</option>
                    @endforeach
                </select>

                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">

                <label for="text">Text</label>
                <input type="text" name="text" class="form-control">

                <button type="sumbit" class="btn btn-success btn-block mt-3">Create Blogpost</button>

            </form>
        </div>
    </div>

@endsection