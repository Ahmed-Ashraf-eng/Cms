@extends('layouts.app')

@section('content')

 @include('partials.alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                        <br>
                        <br>
                    <h3>Hello {{auth()->user()->role}} {{auth()->user()->name}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
