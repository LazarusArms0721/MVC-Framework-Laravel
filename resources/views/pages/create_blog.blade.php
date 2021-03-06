@extends ('layouts.app')

@section ('Title', 'Create Blog')

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Create Blog</h1>
            <hr>
            <form method="POST" action="/blog-action">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="assignment_id">Assignment:</label>
                <select name="assignment_id" id="assignment_id">
                    @foreach ($assignments as $assignment)
                        <option value="{{ $assignment->id}}"> {{$assignment->name}}</option>
                    @endforeach
                </select>
                <br>
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">

                <label for="text">Text</label>
                <textarea rows="10" type="text" name="text" class="form-control"></textarea>

                <button type="submit" class="btn btn-success btn-block mt-3">Create Blogpost</button>
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