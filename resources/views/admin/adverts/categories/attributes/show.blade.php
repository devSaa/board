@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Attributes control</h1>
    @yield('breadcrumbs')
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List attributes</h3>
        </div>

        <div class="box-body">
            <table>
                <tr>
                    <td>
                        <a href="{{ route('admin.adverts.categories.attributes.edit', [$category, $attribute]) }}"
                           class="btn btn-primary margin">Edit</a>
                    </td>
                    <td>
                        <form method="POST"
                              action="{{ route('admin.adverts.categories.attributes.destroy', [$category, $attribute]) }}"
                              class="margin">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </table>

            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $category->slug }}</td>
                </tr>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
