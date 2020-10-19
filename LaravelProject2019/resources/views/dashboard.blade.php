<?php
/**
 * Created by PhpStorm.
 * User: erhan
 * Date: 30/09/2020
 * Time: 00:57
 */
?>

@extends('layouts.app')

@section ('title', 'Dashboard')

@section('stylesheets')


@endsection

@section('content')

        <h1 style="color: #1565c0 !important;">Dashboard</h1>



        <div class="blog-header">
            <h3>Latest Assignments</h3>
            @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
                <a href="/assignment/create" class="btn btn-primary mt-2 mb-2">
                    Create Assignment
                </a>
            @endif
        </div>

        <div class="dashboard-table">
            <table class="full-width" cellpadding="5">
                <thead>
                <tr class="table-head">
                    <th class="">Assignment Name</th>
                    <th class="">Text</th>
                    <th class="">Created At</th>
                    <th class="">Actions</th>
                </tr>
                </thead>
                <tbody>
            @foreach ($assignments as $assignment)
                    <tr class="table-body">
                        <td class="">{{$assignment->name}}</td>
                        <td class="">{{Str::limit($assignment->assignment_text, 45)}}</td>
                        <td class="">{{$assignment->created_at->todatestring()}}</td>

                        <td class="">
                        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_EDITOR))
                                <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-primary">
                                    Edit
                                </a>
                        @endif
                        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))

                                <a id="delete-assignment" href="" class="btn btn-outline-danger">
                                    Delete
                                </a>
                        @endif
                        </td>

                    </tr>

            @endforeach
                </tbody>
                <div class="row">
                    <div class="col-12 text-center">
                        {{ $assignments->links() }}
                    </div>
                </div>
            </table>
        </div>

        <div class="blog-header">
            <h3>Latest Blogposts</h3>
            @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))
            <a href="/blog/create" class="btn btn-primary mt-2 mb-2">
                Create Blogpost
            </a>
            @endif
        </div>

        <div class="dashboard-table">
            <table class="full-width" cellpadding="5">
                <thead>
                <tr class="table-head">
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
                        <td class="">{{$blog->created_at->todatestring()}}</td>
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
                <div class="row">
                    <div class="col-12 text-center">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </table>
        </div>

        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))

        <div class="blog-header">
            <h3>Users</h3>
                {{--<a href="/dashboard/user/create" class="btn btn-primary mt-2 mb-2">--}}
                    {{--Create User--}}
                {{--</a>--}}
        </div>

        <div class="dashboard-table">
            <table class="full-width" cellpadding="5">
                <thead>
                <tr class="table-head">
                    <th class="">User Name</th>
                    <th class="">Email</th>
                    <th class="">Created At</th>
                    <th class="">Roles</th>
                    <th class="">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="table-body">
                        <td class="">{{$user->name}}</td>
                        <td class="">{{$user->email}}</td>
                        <td class="">{{$user->created_at}}</td>
                        <td class="">{{json_encode($user->roles)}}</td>

                           <td>
                                <a href="/dashboard/{{$user->id}}/edit" class="btn btn-primary">
                                    Edit
                                </a>

                               <a id="delete-user" href="" class="btn btn-outline-danger">
                                   Delete
                               </a>
                           </td>

                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

        @endif

        {{--<p>{{$currentPath}}</p>--}}
@endsection


@section('scripts')

    <script>
        var buttonsAssignment = document.querySelectorAll('#delete-assignment');
        var buttonsBlog = document.querySelectorAll('#delete-blog');
        var buttonsUser = document.querySelectorAll('#delete-user');

        for (var i = 0; i < buttonsAssignment.length; i++){
            buttonsAssignment[i].onclick = function(e){
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Once you delete this Assignment, the action cannot be undone",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Cancel",
                    showConfirmButton: true,
                    confirmButtonColor: '#e3342f',
                    confirmButtonText: "<a style='color: white !important;' href='/assignments/{{$blog->id}}/delete'>Yes, I'm sure</a>",
                })

            }
        }

        for (var i = 0; i < buttonsBlog.length; i++){
            buttonsBlog[i].onclick = function(e){
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Once you delete this Blog, the action cannot be undone",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Cancel",
                    showConfirmButton: true,
                    confirmButtonColor: '#e3342f',
                    confirmButtonText: "<a style='color: white !important;' href='/blog/{{$blog->id}}/delete'>Yes, I'm sure</a>",
                })

            }
        }

        for (var i = 0; i < buttonsUser.length; i++){
            buttonsUser[i].onclick = function(e){
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Once you delete this User, the action cannot be undone",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Cancel",
                    showConfirmButton: true,
                    confirmButtonColor: '#e3342f',
                    confirmButtonText: "<a style='color: white !important;' href='/dashboard/{{$user->id}}/delete'>Yes, I'm sure</a>",
                })

            }
        }



    </script>



@endsection




