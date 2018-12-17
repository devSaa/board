@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('breadcrumbs', Breadcrumbs::render())
@section('content_header')
    <h1>Adverts control</h1>
    @yield('breadcrumbs')
@stop
@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/css/admin.css">
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List adverts</h3>
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
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Title</label>
                                    <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="user" class="col-form-label">User</label>
                                    <input id="user" class="form-control" name="user" value="{{ request('user') }}">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="region" class="col-form-label">Region</label>
                                    <input id="region" class="form-control" name="region"
                                           value="{{ request('region') }}">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="category" class="col-form-label">Category</label>
                                    <input id="category" class="form-control" name="category"
                                           value="{{ request('category') }}">
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
                                    <label class="col-form-label">&nbsp;</label><br/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="?" class="btn btn-outline-secondary">Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Updated</th>
                    <th>Title</th>
                    <th>User</th>
                    <th>Region</th>
                    <th>Category</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($adverts as $advert)
                    <tr>
                        <td>{{ $advert->id }}</td>
                        <td>{{ $advert->updated_at }}</td>
                        <td><a href="{{ route('adverts.show', $advert) }}" target="_blank">{{ $advert->title }}</a></td>
                        <td>{{ $advert->user->id }} - {{ $advert->user->name }}</td>
                        <td>
                            @if ($advert->region)
                                {{ $advert->region->id }} - {{ $advert->region->name }}
                            @endif
                        </td>
                        <td>{{ $advert->category->id }} - {{ $advert->category->name }}</td>
                        <td>
                            @if ($advert->isDraft())
                                <span class="badge bg-red">Draft</span>
                            @elseif ($advert->isOnModeration())
                                <span class="badge bg-yellow">Moderation</span>
                            @elseif ($advert->isActive())
                                <span class="badge bg-green">Active</span>
                            @elseif ($advert->isClosed())
                                <span class="badge bg-red">Closed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{ $adverts->links() }}
        </div>
    </div>
@endsection