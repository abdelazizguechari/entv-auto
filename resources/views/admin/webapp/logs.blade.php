@extends('admin.dash')

@section('admin')
<div class="page-content">
<div class="container">
    <h1 class="fs-4">Activity Logs</h1>
    <hr>

    
    <form method="GET" action="{{ route('logs.index') }}" class="mb-4">
        <div class="row">
            <div class="col">
                <label for="description" class="form-label">Description</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ request('description') }}">
            </div>
            <div class="col">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ request('firstname') }}">
            </div>
            <div class="col">
                <label for="date_from" class="form-label">De</label>
                <input type="date" id="date_from" name="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>
            <div class="col">
                <label for="date_to" class="form-label">Au</label>
                <input type="date" id="date_to" name="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-inverse-primary mt-3">Filtrer</button>
    </form>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>LOG ID</th>
                <th>Description</th>
                <th>ID utilisateur</th>
                <th>Créé Le</th>
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