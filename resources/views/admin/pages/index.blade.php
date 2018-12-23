@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Page control</h1>
    @yield('breadcrumbs')
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/css/admin.css">
@stop

@section('content')
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">List pages</h3>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-success pull-right">Add Page</a>
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

                @foreach ($pages as $page)
                    <tr>
                        <td>
                            @for ($i = 0; $i < $page->depth; $i++) &mdash; @endfor
                            <a href="{{ route('admin.pages.show', $page) }}">{{ $page->title }}</a>
                        </td>
                        <td>{{ $page->menu_title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>
                            <div class="display-inline-block">
                                <form method="POST" action="{{ route('admin.pages.first', $page) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary">
                                        <span class="fa fa-angle-double-up"></span>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.pages.up', $page) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary">
                                        <span class="fa fa-angle-up"></span>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.pages.down', $page) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary">
                                        <span class="fa fa-angle-down"></span>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.pages.last', $page) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary">
                                        <span class="fa fa-angle-double-down"></span>
                                    </button>
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