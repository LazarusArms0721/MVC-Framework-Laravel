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

    <div class="container">
        {{--<p>{{$user->name}}</p>--}}
        {{--<p>{{$user->email}}</p>--}}
        {{--<p>{{$user->created_at}}</p>--}}
        {{--<p>{{$user->id}}</p>--}}

        <table>
        <tr class="table-header">
            <td>Name</td>
            <td>Email</td>
            <td>Created At</td>
            <td>Roles</td>
            <td>Action</td>
        </tr>
        <tr class="table-body">
            <td class="">{{$user->name}}</td>
            <td class="">{{$user->email}}</td>
            <td class="">{{$user->created_at}}</td>
            <td class="">{{json_encode($user->roles)}}</td>
            <td>
                <a href="/dashboard/user/{{$user->id}}/edit" class="btn btn-primary">
                    Edit
                </a>

                <a href="/dashboard/user/{{$user->id}}/delete" class="btn btn-outline-danger">
                    Delete
                </a>
            </td>
        </tr>
        </table>
    </div>


@endsection