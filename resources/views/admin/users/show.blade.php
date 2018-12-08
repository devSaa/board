@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Show user</h1>
    @yield('breadcrumbs')
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <table>
                <tr>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary margin">Edit</a>
                    </td>
                    @if ($user->isWait())
                        <td>
                            <form method="POST" action="{{ route('admin.users.verify', $user) }}" class="margin">
                                @csrf
                                <button class="btn btn-success">Verify</button>
                            </form>
                        </td>
                    @endif
                    <td>
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="margin">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($user->isWait())
                            <span class="badge bg-yellow">Waiting</span>
                        @endif
                        @if ($user->isActive())
                            <span class="badge bg-green">Active</span>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection