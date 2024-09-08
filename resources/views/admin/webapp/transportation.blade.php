@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body bg-dark">
                    <h6 class="card-title fs-4">Transportation</h6>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Mission Start</th>
                                <th>Mission End</th>
                                <th>Status</th>
                                <th>Fuel Tokens</th>
                                <th>Distance</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($missions as $mission)
                                @if($mission->type == 'transportation')
                                    <tr>
                                        <td>{{ $mission->name }}</td>
                                        <td>{{ $mission->type }}</td>
                                        <td>{{ $mission->mission_start }}</td>
                                        <td>{{ $mission->mission_end }}</td>
                                        <td>{{ $mission->status }}</td>
                                        <td>{{ $mission->fuel_tokens }}</td>
                                        <td>{{ $mission->distance }}</td>
                                        <td>
                                            <a href="{{ route('missions.edit', ['id' => $mission->id]) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('missions.destroy', ['id' => $mission->id]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mission?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection