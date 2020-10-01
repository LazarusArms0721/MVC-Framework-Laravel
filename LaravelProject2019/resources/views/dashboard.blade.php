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

        <h1>Dashboard</h1>

        @if (Auth::check())
            <a href="/assignments/create" class="btn btn-primary mt-2 mb-2">
                Create Assignment
            </a>
        @endif

        <div class="assignments-table">
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
                    <tr class="">
                        <td class="">{{$assignment->name}}</td>
                        <td class="">{{$assignment->assignment_text}}</td>
                        <td class="">Erhan Akin</td>
                        <td class="">{{$assignment->created_at}}</td>
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

        @if (Auth::check())
            <a href="/blog/create" class="btn btn-primary mt-2 mb-2">
                Create Blogpost
            </a>
        @endif

        <div class="assignments-table">
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
                    <tr class="">
                        <td class="">{{$blog->title}}</td>
                        <td class="">{{ substr($blog->text, 0, 23) }}</td>
                        <td class="">{{$blog->assignment['name']}}</td>
                        <td class="">Erhan Akin</td>
                        <td class="">{{$blog->created_at}}</td>
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



@endsection