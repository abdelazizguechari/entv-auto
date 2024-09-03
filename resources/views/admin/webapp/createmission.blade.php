@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Create Mission</h6>
                    <form id="missionForm" action="{{ route('missions.store.mission') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="mission_start">Mission Start</label>
                            <input type="datetime-local" class="form-control" id="mission_start" name="mission_start">
                        </div>
                        <div class="form-group">
                            <label for="mission_end">Mission End</label>
                            <input type="datetime-local" class="form-control" id="mission_end" name="mission_end">
                        </div>
                        <div class="form-group">
                            <label for="crew_leader">Crew Leader</label>
                            <input type="text" class="form-control" id="crew_leader" name="crew_leader">
                        </div>
                        <div class="form-group">
                            <label for="crew_name">Crew Name</label>
                            <input type="text" class="form-control" id="crew_name" name="crew_name">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="ongoing">Ongoing</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fuel_tokens">Fuel Tokens</label>
                            <input type="number" class="form-control" id="fuel_tokens" name="fuel_tokens">
                        </div>
                        <div class="form-group">
                            <label for="distance">Distance</label>
                            <input type="number" class="form-control" id="distance" name="distance">
                        </div>
                        <div class="form-group">
                            <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                <option value="">Select a car</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}">{{ $car->immatriculation }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($fromEvent)
                            <input type="hidden" name="event_id" value="{{ $eventId }}">
                            <button type="submit" class="btn btn-secondary" name="action" value="add_to_event">Add to Event</button>
                        @else
                            <button type="submit" class="btn btn-primary" name="action" value="create">Create Mission</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection