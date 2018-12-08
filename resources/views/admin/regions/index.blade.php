@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Region control</h1>
    @yield('breadcrumbs')
@stop


@section('content')
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">List regions</h3>
            <a href="{{ route('admin.regions.create') }}" class="btn btn-success pull-right">Add Region</a>
        </div>

        <div class="box-body">
            @include('admin.regions._list', ['regions' => $regions])
        </div>
    </div>
@endsection