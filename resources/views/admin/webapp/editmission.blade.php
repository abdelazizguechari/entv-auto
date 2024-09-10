@extends('admin.dash')

@section('admin')

<style>
    .form-control {
        background-color: transparent !important;
    }
    
    select.form-control option {
        background-color: #060C17;
        color: #fff; /* Pour garantir la lisibilité du texte */
    }
</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body ">
                    <h6 class="card-title">Edit Mission</h6>
                    <form action="{{ route('missions.update', ['id' => $mission->id]) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="row">
                            <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Le sujet de mission</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $mission->name }}" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Type de mission</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $mission->name }}" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Lieu de mission</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $mission->name }}" required>
                        </div>
                    </div>

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
                            {{-- <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                <option value="">Select a car</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}" {{ $mission->car_id == $car->immatriculation ? 'selected' : '' }}>
                                        {{ $car->immatriculation }}
                                    </option>
                                @endforeach
                            </select> --}}

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $mission->description }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Mission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection