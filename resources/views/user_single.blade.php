<?php
/**
 * Created by PhpStorm.
 * User: erhan
 * Date: 30/09/2020
 * Time: 00:57
 */
?>

@extends('layouts.app')

@section ('title', 'Dashboard User')

@section('stylesheets')


@endsection

@section('content')

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

                <label for="roles">Active role(s): {{json_encode($user->roles)}}</label>


                <p>Roles</p>
                <input type="checkbox" id="admin" name="roles[]" value='ROLE_ADMIN'>
                <label for="admin">Admin</label><br>
                <input type="checkbox" id="editor" name="roles[]" value='ROLE_EDITOR'>
                <label for="editor">Editor</label><br>
                <input type="checkbox" id="management" name="roles[]" value="ROLE_MANAGEMENT">
                <label for="management">Management</label><br>





                <button type="submit" class="btn btn-success mt-3">Update User</button>

                @if (Auth::check())
                    <a id="user-delete"href="" class="btn btn-outline-danger mt-3 ">
                        Delete User
                    </a>
                @endif

                <a href="/dashboard" class="btn btn-outline-info mt-3">Return</a>

            </form>
        </div>
    </div>


@section('scripts')
    <script>


        $( "#user-delete" ).click(function(e) {
            e.preventDefault();

            swal({
                title: "Are you sure?",
                text: "Once your account has been deleted there is no going back.",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "No, take me back",
                showConfirmButton: true,
                confirmButtonColor: '#e3342f',
                confirmButtonText: "<a style='color: white !important;'href='/dashboard/{{$user->id}}/delete'>Yes, I'm sure</a>",

            })


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
