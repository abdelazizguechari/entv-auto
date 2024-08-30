@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Missions</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Mission Start</th>
                                <th>Mission End</th>
                                <th>Crew Leader</th>
                                <th>Crew Name</th>
                                <th>Status</th>
                                <th>Fuel Tokens</th>
                                <th>Distance</th>
                                <th>Cars</th>
                                <th>Drivers</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($missions as $mission)
                                <tr>
                                    <td>{{ $mission->id }}</td>
                                    <td>{{ $mission->name }}</td>
                                    <td>{{ $mission->type }}</td>
                                    <td>{{ $mission->description }}</td>
                                    <td>{{ $mission->mission_start }}</td>
                                    <td>{{ $mission->mission_end }}</td>
                                    <td>{{ $mission->crew_leader }}</td>
                                    <td>{{ $mission->crew_name }}</td>
                                    <td>{{ $mission->status }}</td>
                                    <td>{{ $mission->fuel_tokens }}</td>
                                    <td>{{ $mission->distance }}</td>
                                    <td>
                                        @foreach($mission->cars as $car)
                                            {{ $car->immatriculation }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($mission->drivers as $driver)
                                            {{ $driver->nom }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('missions.edit', ['id' => $mission->id]) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('missions.destroy', ['id' => $mission->id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mission?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection