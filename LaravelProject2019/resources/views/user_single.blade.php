@extends ('layouts.app')

@section ('title', 'Edit User')

@section('stylesheets')


@endsection

@section ('content')

    @extends ('layouts.app')

@section ('title', 'Create Assignment')

@section('stylesheets')


@endsection

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Update User: {{$user->name}}</h1>
            <hr>
            <form method="POST" action="/dashboard/{{$user->id}}/update" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type = "hidden" name = "_method" value = "put">

                <label for="name">Name</label>
                <input type="name" name="name" class="form-control" value="<?php echo $user->name; ?>">

                <label for="email">Email address</label>
                <input name="email" class="form-control mb-3" value="<?php echo $user->email; ?>">

                <p>Active role(s): {{json_encode($user->roles)}}</p>

                <label for="roles">Role(s)</label>
                <br>
                    @foreach ($roles as $role)
                        <input type="checkbox" name="{{$role}}" id="roles" value="{{$role}}">
                        <label for="{{$role}}">{{$role}}</label>
                        <br>
                    @endforeach



                <button type="submit" class="btn btn-success mt-3">Update User</button>

                @if (Auth::check())
                    <a href="/dashboard/{{$user->id}}/delete" class="btn btn-outline-danger mt-3 ">
                        Delete User
                    </a>
                @endif

                <a href="/dashboard" class="btn btn-outline-info mt-3">Return</a>

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
















@endsection