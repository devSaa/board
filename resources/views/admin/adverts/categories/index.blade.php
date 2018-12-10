@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Category control</h1>
    @yield('breadcrumbs')
@stop
@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/css/admin.css">
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List category</h3>
            <a href="{{ route('admin.adverts.categories.create') }}" class="btn btn-success pull-right">Add Category</a>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>
                            @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                            <a href="{{ route('admin.adverts.categories.show', $category) }}">{{ $category->name }}</a>
                        </td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <div class="display-inline-block">
                                <form method="POST" action="{{ route('admin.adverts.categories.first', $category) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span
                                                class="fa fa-angle-double-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.adverts.categories.up', $category) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.adverts.categories.down', $category) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span
                                                class="fa fa-angle-down"></span>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.adverts.categories.last', $category) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span
                                                class="fa fa-angle-double-down"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection