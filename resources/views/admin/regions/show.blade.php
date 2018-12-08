@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Region show</h1>
    @yield('breadcrumbs')
@stop


@section('content')
    <div class="box">
        <div class="box-header with-border">
            <table>
                <tr>
                    <td>
                        <a href="{{ route('admin.regions.edit', $region) }}" class="btn btn-primary margin">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.regions.update', $region) }}" class="margin">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.regions.create', ['parent' => $region->id]) }}"
                           class="btn btn-success">Add SubRegion</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $region->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $region->name }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $region->slug }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="box-body">
            @include('admin.regions._list', ['regions' => $regions])
        </div>
@endsection