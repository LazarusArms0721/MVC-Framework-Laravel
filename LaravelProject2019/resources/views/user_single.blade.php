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

                <label for="roles">Active role(s)</label>
                <input name="roles" class="form-control mb-3" value="{{json_encode($user->roles)}}">


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
