@extends ('layouts.app')

@section ('title', 'Update Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Update Assignment</h1>
            <hr>
            <form id="assignment-form"method="POST" action="/assignments/{{$assignment->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type = "hidden" name = "_method" value = "put">


                <label for="name">Assignment Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $assignment->name; ?>">

                <label for="assignment_text">Assignment Text</label>
                <textarea rows="10" name="assignment_text" class="form-control"><?php echo $assignment->assignment_text; ?></textarea>

                <label for="assignment_image">Select image to upload:</label>
                <input type="file" name="assignment_image" class="form-control" value="<?php echo $assignment->assignment_image; ?>">

                <button id="update-assignment" type="submit" class="btn btn-success mt-3">Update Assignment</button>

                @if (Auth()->user()->hasRole(App\Role\Userrole::ROLE_ADMIN))
                    <a id="delete-assignment" href="" class="btn btn-outline-danger mt-3 ">
                        Delete Assignment
                    </a>
                @endif
            </form>
        </div>
    </div>

@section('scripts')
    <script>


        $( "#delete-assignment" ).click(function(e) {
            e.preventDefault();
            swal({
                title: "Delete Assignment?",
                text: "Once you delete this Assignmnent there is no going back.",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "No, take me back",
                showConfirmButton: true,
                confirmButtonColor: '#e3342f',
                confirmButtonText: "<a style='color: white !important;' href='/assignments/{{$assignment->id}}/delete'>Yes, I'm sure</a>",
            })
        });

        $("#update-assignment" ).click(function(e) {
            e.preventDefault();
            var form = $(this).parents('#assignment-form');
            console.log(form);
            swal({
                title:  "Update Assignment?",
                text:   "You are about to update this assignment",
                type:   "info",
                showCancelButton: true,
                cancelButtonText: "Nevermind",
                showConfirmButton: true,
                confirmButtonColor: "#e3342f",
            }).then(function(isConfirm){
                if(isConfirm){
                    $('#assignment-form').submit();
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