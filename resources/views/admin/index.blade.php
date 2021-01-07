@extends('layouts.admin')


@section('title')

    Admin Panel

    @endsection


@section('header')
    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>Welcome to admin panel {{auth()->user()->name}}</h1>
                    <h3 >Here you can see informations only for <b> users </b>  </h3>
                    <br>
                    <br>
                    <form class="input-group" action="{{route('admin.search')}}" method="GET">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                        <div class="input-group-addon">
                            <span class="input-group-text"><button type="submit" class="btn btn-success">Search</button></span>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </header><!-- /.header -->


@endsection


@section('content')


    <table   class="table table-dark">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Edit </th>
        <th>Delete</th>
        <th>Status</th>

        </thead>

        <tbody>


        @foreach($users as $user)

            <tr>

                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('user.edit' , $user->id)}}"><button class="btn btn-success btn-sm">Edit</button></a></td>
                <td>
                    <form action="{{route('user.destroy' , $user->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
                <td>
                    @if($user->is_active == 1)
                        <a href="{{route('user.is_active' , $user->id)}}"><button class="btn btn-danger btn-sm">Deactivate</button></a>
                        @else
                        <a href="{{route('user.is_active' , $user->id)}}"> <button class="btn btn-success btn-sm">Activate</button></a>
                        @endif
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    @endsection
