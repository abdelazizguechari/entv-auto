@extends('admin.dash')

@section('admin')



<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Mission</h6>
                    <form action="{{ route('missions.update', ['id' => $mission->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Mission Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $mission->name) }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mission_type">Mission Type</label>
                                    <input type="text" class="form-control" id="mission_type" name="mission_type" value="{{ old('mission_type', $mission->type) }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lieu_mission">Mission Location</label>
                                    <input type="text" class="form-control" id="lieu_mission" name="lieu_mission" value="{{ old('lieu_mission', $mission->location) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mission_start">Mission Start</label>
                            <input type="datetime-local" class="form-control" id="mission_start" name="mission_start" value="{{ old('mission_start', $mission->mission_start) }}">
                        </div>

                        <div class="form-group">
                            <label for="mission_end">Mission End</label>
                            <input type="datetime-local" class="form-control" id="mission_end" name="mission_end" value="{{ old('mission_end', $mission->mission_end) }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="ongoing" {{ old('status', $mission->status) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="scheduled" {{ old('status', $mission->status) == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="completed" {{ old('status', $mission->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fuel_tokens">Fuel Tokens</label>
                            <input type="number" class="form-control" id="fuel_tokens" name="fuel_tokens" value="{{ old('fuel_tokens', $mission->fuel_tokens) }}">
                        </div>

                        <div class="form-group">
                            <label for="distance">Distance</label>
                            <input type="number" class="form-control" id="distance" name="distance" value="{{ old('distance', $mission->distance) }}">
                        </div>

                        <div class="form-group">
                            <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                <option value="">Select a car</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}" {{ old('car_id', $mission->car_id) == $car->immatriculation ? 'selected' : '' }}>
                                        {{ $car->immatriculation }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if($mission->type == 'mission')
                        <div class="form-group">
                            <label for="crew_leader">Crew Leader</label>
                            <input type="text" class="form-control" id="crew_leader" name="crew_leader" value="{{ old('crew_leader', $mission->crew_leader) }}">
                        </div>

                        <div class="form-group">
                            <label for="crew_name">Crew Name</label>
                            <input type="text" class="form-control" id="crew_name" name="crew_name" value="{{ old('crew_name', $mission->crew_name) }}">
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $mission->description) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Mission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection