@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-4">Edit Transportation Mission</h6>

                    <hr>
                    <form action="{{ route('transportation.update', ['id' => $mission->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $mission->name }}" required>
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
                            <label for="distance">Distance</label>
                            <input type="number" class="form-control" id="distance" name="distance" value="{{ $mission->distance }}">
                        </div>
                        <div class="form-group">
                            <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                <option value="">Select a car</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}" {{ $mission->car_id == $car->immatriculation ? 'selected' : '' }}>
                                        {{ $car->immatriculation }}
                                    </option>
                                @endforeach
                                
                            </select>
<hr>
                            <div class="form-group">
                                <label class="mb-1" for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $mission->description }}</textarea>
                            </div>
                            <hr>
                        </div>
                        <button type="submit" class="btn btn-primary">Update transportation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection