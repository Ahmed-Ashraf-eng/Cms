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
                    <h3 >Here you can modify only users </h3>

                </div>
            </div>

        </div>
    </header><!-- /.header -->
@endsection


@section('content')

    <table   class="table table-dark">
        <thead>
        <th>Day</th>
        <th>Number of registed users</th>
        </thead>

        <tbody>

        @foreach($arrOfCounts as $key => $count)

            <tr>

                <td>{{$key}}</td>
                <td>{{$count}}</td>
            </tr>

        @endforeach
        </tbody>

    </table>

@endsection
