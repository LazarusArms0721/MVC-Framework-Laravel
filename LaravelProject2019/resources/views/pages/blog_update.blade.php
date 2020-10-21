@extends ('layouts.app')

@section ('title', 'Create Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Update Blog post</h1>
            <hr>
            <form id="blogpost-form" method="POST" action="/blog/{{$blog->id}}/update" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type = "hidden" name = "_method" value = "put">

                <label for="assignment_id">Assignment:</label>
                <select name="assignment_id" id="assignment_id">
                    <option value="{{$blog->assignment_id}}">{{$blog->assignment['name']}}</option>
                    @foreach ($assignments as $assignment)
                        <option value="{{ $assignment->id}}"> {{$assignment->name}}</option>
                    @endforeach
                </select>
                <br>

                <label for="title">Blogpost Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $blog->title; ?>">

                <label for="text">Blogpost Text</label>
                <textarea rows="10" name="text" class="form-control"><?php echo $blog->text; ?></textarea>

                <button id="update-blog" type="submit" class="btn btn-success mt-3">Update Blogpost</button>

                @if (Auth::check())
                    <a id="delete-blog" href="" class="btn btn-outline-danger mt-3 ">
                        Delete Assignment
                    </a>
                @endif

            </form>
        </div>
    </div>

@section('scripts')
    <script>


        $( "#delete-blog" ).click(function(e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once you delete this Blogpost there is no going back.",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "No, take me back",
                showConfirmButton: true,
                confirmButtonColor: '#e3342f',
                confirmButtonText: "<a style='color: white !important;' href='/blog/{{$blog->id}}/delete'>Yes, I'm sure</a>",
            })
        });

        $("#update-blog" ).click(function(e) {
            e.preventDefault();
            var form = $(this).parents('#blogpost-form');
            console.log(form);
            swal({
                title:  "Update Blogpost?",
                text:   "You are about to update this blogpost",
                type:   "info",
                showCancelButton: true,
                cancelButtonText: "Nevermind",
                showConfirmButton: true,
                confirmButtonColor: "#e3342f",
            }).then(function(isConfirm){
                if(isConfirm){
                    $('#blogpost-form').submit();
                }
            });
        });

    </script>

@endsection

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