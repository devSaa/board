@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>User control</h1>
    @yield('breadcrumbs')
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List users</h3>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success pull-right">Add User</a>
        </div>

        <div class="box-body">
            <div class="card mb-3">
                <div class="card-header">Filter</div>
                <div class="card-body">
                    <form action="?" method="GET">
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="id" class="col-form-label">ID</label>
                                    <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input id="email" class="form-control" name="email" value="{{ request('email') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value=""></option>
                                        @foreach ($statuses as $value => $label)
                                            <option value="{{ $value }}"{{ $value === request('status') ? ' selected' : '' }}>{{ $label }}</option>
                                        @endforeach;
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="role" class="col-form-label">Role</label>
                                    <select id="role" class="form-control" name="role">
                                        <option value=""></option>
                                        @foreach ($roles as $value => $label)
                                            <option value="{{ $value }}"{{ $value === request('role') ? ' selected' : '' }}>{{ $label }}</option>
                                        @endforeach;
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label">&nbsp;</label><br/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->isWait())
                                <span class="badge badge bg-yellow">Waiting</span>
                            @endif
                            @if ($user->isActive())
                                <span class="badge badge bg-green">Active</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="box-footer clearfix">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection