@extends('admin.dash')

@section('admin')
<div class="page-content">
<div class="container">
    <h1 class="fs-4">Activity Logs</h1>
    <hr>

    
    <form method="GET" action="{{ route('logs.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ request('description') }}">
            </div>
            <div class="col-md-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" id="user_id" name="user_id" class="form-control" value="{{ request('user_id') }}">
            </div>
            <div class="col-md-3">
                <label for="date_from" class="form-label">Date From</label>
                <input type="date" id="date_from" name="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>
            <div class="col-md-3">
                <label for="date_to" class="form-label">Date To</label>
                <input type="date" id="date_to" name="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-inverse-primary mt-3">Filter</button>
    </form>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>User ID</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->causer_id }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No logs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>
@endsection