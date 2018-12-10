@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Category control</h1>
    @yield('breadcrumbs')
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List category</h3>
        </div>

        <div class="box-body">

            <div class="d-flex flex-row mb-3">
                <table>
                    <tr>
                        <td><a href="{{ route('admin.adverts.categories.edit', $category) }}"
                               class="btn btn-primary margin">Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.adverts.categories.destroy', $category) }}"
                                  class="margin">
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

            <p class="margin"><a href="{{ route('admin.adverts.categories.attributes.create', $category) }}"
                                 class="btn btn-success">Add Attribute</a></p>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sort</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Required</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <th colspan="4">Parent attributes</th>
                </tr>

                @forelse ($parentAttributes as $attribute)
                    <tr>
                        <td>{{ $attribute->sort }}</td>
                        <td>{{ $attribute->name }}</td>
                        <td>{{ $attribute->type }}</td>
                        <td>{{ $attribute->required ? 'Yes' : '' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">None</td>
                    </tr>
                @endforelse

                <tr>
                    <th colspan="4">Own attributes</th>
                </tr>

                @forelse ($attributes as $attribute)
                    <tr>
                        <td>{{ $attribute->sort }}</td>
                        <td>
                            <a href="{{ route('admin.adverts.categories.attributes.show', [$category, $attribute]) }}">{{ $attribute->name }}</a>
                        </td>
                        <td>{{ $attribute->type }}</td>
                        <td>{{ $attribute->required ? 'Yes' : '' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">None</td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>
@endsection