@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Page control</h1>
    @yield('breadcrumbs')
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="d-flex flex-row mb-3">
                <table>
                    <tr>
                        <td>
                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-primary margin">Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="margin">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>

            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $page->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $page->title }}</td>
                </tr>
                <tr>
                    <th>Menu Title</th>
                    <td>{{ $page->menu_title }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $page->slug }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $page->description }}</td>
                </tr>
                </tbody>
            </table>

            <div class="card">
                <div class="card-body pb-1">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection