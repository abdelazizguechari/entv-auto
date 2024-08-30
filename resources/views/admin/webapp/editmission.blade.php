@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Mission</h6>
                    <form id="edit-mission-form" action="{{ route('missions.update', $mission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $mission->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $mission->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="mission_start">Mission Start</label>
                            <input type="datetime-local" class="form-control" id="mission_start" name="mission_start" value="{{ $mission->mission_start }}">
                        </div>
                        <div class="form-group">
                            <label for="mission_end">Mission End</label>
                            <input type="datetime-local" class="form-control" id="mission_end" name="mission_end" value="{{ $mission->mission_end }}">
                        </div>
                        <div class="form-group">
                            <label for="crew_leader">Crew Leader</label>
                            <input type="text" class="form-control" id="crew_leader" name="crew_leader" value="{{ $mission->crew_leader }}">
                        </div>
                        <div class="form-group">
                            <label for="crew_name">Crew Name</label>
                            <input type="text" class="form-control" id="crew_name" name="crew_name" value="{{ $mission->crew_name }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="ongoing" {{ $mission->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="scheduled" {{ $mission->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="completed" {{ $mission->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fuel_tokens">Fuel Tokens</label>
                            <input type="number" class="form-control" id="fuel_tokens" name="fuel_tokens" value="{{ $mission->fuel_tokens }}">
                        </div>
                        <div class="form-group">
                            <label for="fuel_tokens_used">Fuel Tokens Used</label>
                            <input type="number" class="form-control" id="fuel_tokens_used" name="fuel_tokens_used" value="{{ $mission->fuel_tokens_used }}">
                        </div>
                        <div class="form-group">
                            <label for="distance">Distance</label>
                            <input type="number" class="form-control" id="distance" name="distance" value="{{ $mission->distance }}">
                        </div>
                        <div class="form-group" id="car-select-group">
                            <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id">
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}" {{ $mission->car_id == $car->immatriculation ? 'selected' : '' }}>{{ $car->immatriculation }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="driver-select-group">
                            <label for="driver_id">Driver</label>
                            <select class="form-control" id="driver_id" name="driver_id">
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ $mission->driver_id == $driver->id ? 'selected' : '' }}>{{ $driver->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="cars-select-group" style="display: none;">
                            <label for="cars">Cars</label>
                            <select class="form-control" id="cars" name="cars[]" multiple>
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}" {{ in_array($car->immatriculation, $mission->cars->pluck('immatriculation')->toArray()) ? 'selected' : '' }}>{{ $car->immatriculation }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="drivers-select-group" style="display: none;">
                            <label for="drivers">Drivers</label>
                            <select class="form-control" id="drivers" name="drivers[]" multiple>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ in_array($driver->id, $mission->drivers->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $driver->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Mission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const missionType = "{{ $mission->type }}"; // Assuming you have a 'type' field in your mission model

        if (missionType === 'event') {
            document.getElementById('car-select-group').style.display = 'none';
            document.getElementById('driver-select-group').style.display = 'none';
            document.getElementById('cars-select-group').style.display = 'block';
            document.getElementById('drivers-select-group').style.display = 'block';
        }
    });
</script>

@endsection