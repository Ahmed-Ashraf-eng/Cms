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
                    <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

                </div>
            </div>

        </div>
    </header><!-- /.header -->
@endsection


@section('content')

    <div style="color: black" class="card card-default">
        <div class="card card-header">
            Edit User
        </div>
        <div class="card-body">

            @include('partials.errors')
    <form class="" action="{{route('user.update' , $user->id)}}" method="post">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">Name :</label>
            <input name="name" class="form-control" type="text" value="{{ isset($user) ? $user->name : ''}}">
        </div>

        <div class="form-group">
            <label for="name">Email :</label>
            <input name="email" class="form-control" type="text" value="{{ isset($user) ? $user->email : ''}}">
        </div>


        <div class="form-group">
            <label for="role"> Role :</label>
            <select name="role" class="form-control">
                @foreach($roles as $role)
                    <option value="{{$role}}"
                    @if($user->role == $role)
                        selected
                        @endif
                    >
                        {{$role}}
                    </option>
                    @endforeach
            </select>
        </div>

        <input type="submit" value="Update" class="btn btn-primary" >

    </form>
        </div>
    </div>
@endsection
