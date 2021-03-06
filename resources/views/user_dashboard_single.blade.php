<?php
/**
 * Created by PhpStorm.
 * User: erhan
 * Date: 30/09/2020
 * Time: 00:57
 */
?>

@extends('layouts.app')

@section ('title', 'User Dashboard')

@section('stylesheets')


@endsection

@section('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Edit Profile: {{$user->name}}</h1>
            <hr>
            <form method="POST" action="/dashboard/user/{{$user->id}}/update" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type = "hidden" name = "_method" value = "put">

                <label for="name">Your Name</label>
                <input type="name" name="name" class="form-control" value="<?php echo $user->name; ?>">

                <label for="email">Your Email address</label>
                <input name="email" class="form-control mb-3" value="<?php echo $user->email; ?>">

                <p>Your Current Role(s): {{json_encode($user->roles)}}</p>


                <button type="submit" class="btn btn-success mt-3">Update Account</button>

                @if (Auth::check())
                    {{--<a href="/dashboard/user/{{$user->id}}/delete" class="btn btn-outline-danger mt-3 ">--}}
                        {{--Delete Account--}}
                    {{--</a>--}}

                    <a href="" id="delete-action" data-id="{{$user->id}}" class="btn btn-outline-danger mt-3">Delete Account</a>
                @endif

                <a href="/dashboard/user" class="btn btn-outline-info mt-3">Return</a>

            </form>
        </div>
    </div>



@section('scripts')
        <script>


            $( "#delete-action" ).click(function(e) {
                e.preventDefault();

                swal({
                    title: "Are you sure?",
                    text: "Once your account has been deleted there is no going back.",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "No, take me back",
                    showConfirmButton: true,
                    confirmButtonColor: '#e3342f',
                    confirmButtonText: "<a href='/dashboard/user/{{$user->id}}/delete'>Yes, I'm sure</a>",

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















