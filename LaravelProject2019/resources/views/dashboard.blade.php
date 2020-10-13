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
            @if (Auth::check())
                <a href="/assignments/create" class="btn btn-primary mt-2 mb-2">
                    Create Assignment
                </a>
            @endif
        </div>

        <div class="dashboard-table">
            <table class="" cellpadding="5" border="2">
                <thead>
                <tr class="table-head">
                    <th class="">Assignment Name</th>
                    <th class="">Text</th>
                    <th class="">Author</th>
                    <th class="">Created At</th>
                    <th class="">Actions</th>
                </tr>
                </thead>
                <tbody>
            @foreach ($assignments as $assignment)
                    <tr class="table-body">
                        <td class="">{{$assignment->name}}</td>
                        <td class="">{{$assignment->assignment_text}}</td>
                        <td class="">Erhan Akin</td>
                        <td class="">{{$assignment->created_at->todatestring()}}</td>
                        @if (Auth::check())
                        <td class="">
                                <a href="/assignments/{{$assignment->id}}/edit" class="btn btn-primary">
                                    Edit
                                </a>

                                <a href="/assignments/{{$assignment->id}}/delete" class="btn btn-outline-danger">
                                    Delete
                                </a>
                        </td>
                        @endif
                    </tr>

            @endforeach
                </tbody>
            </table>
        </div>

        <div class="blog-header">
            <h3>Latest Blogposts</h3>
        @if (Auth::check())
            <a href="/blog/create" class="btn btn-primary mt-2 mb-2">
                Create Blogpost
            </a>
        @endif
        </div>

        <div class="dashboard-table">
            <table class="" cellpadding="5" border="2">
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
                        @if (Auth::check())
                        <td class="">
                            <a href="/blog/{{$blog->id}}/edit" class="btn btn-primary">
                                Edit
                            </a>

                            <a href="/blog/{{$blog->id}}/delete" class="btn btn-outline-danger">
                                Delete
                            </a>
                        </td>
                        @endif
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

        <div class="dashboard-table">
            <table class="" cellpadding="5" border="2">
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
                        <td class="">
                          {{$user->roles}}
                        </td>
                        @if (Auth::check())
                           <td>
                                <a href="/dashboard/{{$user->id}}/edit" class="btn btn-primary">
                                    Edit
                                </a>

                               <a href="/dashboard/{{$user->id}}/delete" class="btn btn-outline-danger">
                                   Delete
                               </a>
                           </td>
                        @endif
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

        {{--<p>{{$currentPath}}</p>--}}



@endsection