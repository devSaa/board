@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('cabinet.home') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.adverts.index') }}">Adverts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.favorites.index') }}">Favorites</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.profile.home') }}">Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
