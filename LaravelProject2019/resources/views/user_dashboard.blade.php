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
            <div class="col-md-2 p-2">
                <img src="" alt="">
            </div>
            <div class="col-md-1 bg-black p-2">
                <p>Name:</p>
                <p>Email:</p>
                <p>Created At:</p>
                <p>Roles:</p>
            </div>
            <div class="col-xs-6 bg-dark p-2">
                <p class="">{{$user->name}}</p>
                <p class="">{{$user->email}}</p>
                <p class="">{{$user->created_at}}</p>
                <p class="">{{json_encode($user->roles)}}</p>
            </div>
        </div>

        <div class="row mt-1 mb-1">
            <a href="/dashboard/user/{{$user->id}}/edit" class="btn btn-primary">
                Edit
            </a>

            <a href="/dashboard/user/{{$user->id}}/delete" class="btn btn-outline-danger">
                Delete
            </a>
        </div>

    <h1>Latest blogposts made by {{$user->name}}</h1>


        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
            <a href="/blog/create" class="btn btn-primary mt-2 mb-2">
                Create Blogpost
            </a>
        @endif
        <table class="table" cellspacing="0">
            <thead>
            <tr>
                <th class="">Blogpost Title</th>
                <th class="">Blog Text</th>
                <th class="">Assignment</th>
                <th class="">Author</th>
                <th class="">Created At</th>
                <th class="">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($blogs as $blog)
                <tr class="table-body">
                    <td class="">{{$blog->title}}</td>
                    <td class="">{{ substr($blog->text, 0, 23) }}</td>
                    <td class="">{{$blog->assignment['name']}}</td>
                    <td class="">{{$blog->user['name']}}</td>
                    <td class="">{{$blog->created_at->format('d-m-Y H:i')}}</td>
                    <td class="">
                        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_EDITOR))
                            <a href="/blog/{{$blog->id}}/edit" class="btn btn-primary">
                                Edit
                            </a>
                        @endif

                        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))

                            <a id="delete-blog" href="" class="btn btn-outline-danger">
                                Delete
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{--{{ $blogs->links() }}--}}
            </div>
        </div>




@endsection