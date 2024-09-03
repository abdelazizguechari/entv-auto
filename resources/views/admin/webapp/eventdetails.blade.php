@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Event Details</h6>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" readonly>{{ $event->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_start">Event Start</label>
                        <input type="text" class="form-control" id="event_start" name="event_start" value="{{ $event->event_start }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="event_end">Event End</label>
                        <input type="text" class="form-control" id="event_end" name="event_end" value="{{ $event->event_end }}" readonly>
                    </div>

                    <h6 class="card-title mt-4">Missions</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Mission Start</th>
                                <th>Mission End</th>
                                <th>Crew Leader</th>
                                <th>Crew Name</th>
                                <th>Status</th>
                                <th>Fuel Tokens</th>
                                <th>Distance</th>
                                <th>Car ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($event->missions as $mission)
                                <tr>
                                    <td>{{ $mission->id }}</td>
                                    <td>{{ $mission->name }}</td>
                                    <td>{{ $mission->description }}</td>
                                    <td>{{ $mission->mission_start }}</td>
                                    <td>{{ $mission->mission_end }}</td>
                                    <td>{{ $mission->crew_leader }}</td>
                                    <td>{{ $mission->crew_name }}</td>
                                    <td>{{ $mission->status }}</td>
                                    <td>{{ $mission->fuel_tokens }}</td>
                                    <td>{{ $mission->distance }}</td>
                                    <td>{{ $mission->car_id }}</td>
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