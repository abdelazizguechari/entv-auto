@extends('admin.dash')

@section('admin')
    <h1>Missions List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Start</th>
                <th>End</th>
                <th>Crew Leader</th>
                <th>Crew Name</th>
                <th>Status</th>
                <th>Fuel Tokens</th>
                <th>Assigned Vehicles</th>
                <th>Assigned Driver</th>
            </tr>
        </thead>
        <tbody>
            @foreach($missions as $mission)
                <tr>
                    <td>{{ $mission->name }}</td>
                    <td>{{ $mission->description }}</td>
                    <td>{{ $mission->type }}</td>
                    <td>{{ $mission->mission_start }}</td>
                    <td>{{ $mission->mission_end }}</td>
                    <td>{{ $mission->crew_leader }}</td>
                    <td>{{ $mission->crew_name }}</td>
                    <td>{{ $mission->status }}</td>
                    <td>{{ $mission->fuel_tokens }}</td>
                    <td>
                        @if($mission->type === 'evenements')
                            @if($mission->cars->count())
                                @foreach($mission->cars as $car)
                                    {{ $car->marque }} - {{ $car->immatriculation }}<br>
                                @endforeach
                            @else
                                No vehicles assigned
                            @endif
                        @else
                            @if($mission->car)
                                {{ $mission->car->marque }} - {{ $mission->car->immatriculation }}
                            @else
                                No vehicle assigned
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($mission->driver)
                            {{ $mission->driver->first_name }} {{ $mission->driver->last_name }}
                        @else
                            No driver assigned
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection