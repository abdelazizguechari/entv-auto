@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title" id="form-title">Edit Mission</h6>
                    <form action="{{ route('missions.update', ['id' => $mission->id]) }}" method="POST" id="editMissionForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="mission_type" name="mission_type" value="{{ $mission->type }}">
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
                        <div class="form-group" id="crew_leader_group">
                            <label for="crew_leader">Crew Leader</label>
                            <input type="text" class="form-control" id="crew_leader" name="crew_leader" value="{{ $mission->crew_leader }}">
                        </div>
                        <div class="form-group" id="crew_name_group">
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
                            <label for="distance">Distance</label>
                            <input type="number" class="form-control" id="distance" name="distance" value="{{ $mission->distance }}">
                        </div>
                        <div class="form-group" id="carSelectGroup">
                            <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id[]" required>
                                <option value="">Select a car</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}" {{ $mission->cars->contains($car->immatriculation) ? 'selected' : '' }}>{{ $car->immatriculation }}</option>
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
        const missionType = document.getElementById('mission_type').value;
        const formTitle = document.getElementById('form-title');
        const carSelect = document.getElementById('car_id');
        const crewLeaderGroup = document.getElementById('crew_leader_group');
        const crewNameGroup = document.getElementById('crew_name_group');

        // Set form title based on mission type
        if (missionType === 'transportation') {
            formTitle.textContent = 'Edit Transportation Mission';
        } else if (missionType === 'mission') {
            formTitle.textContent = 'Edit Mission';
        } else if (missionType === 'evenements') {
            formTitle.textContent = 'Edit Event Mission';
        }

        // Adjust form fields based on mission type
        if (missionType === 'evenements') {
            carSelect.setAttribute('multiple', 'multiple');
            crewLeaderGroup.style.display = 'block';
            crewNameGroup.style.display = 'block';
        } else if (missionType === 'transportation') {
            carSelect.removeAttribute('multiple');
            crewLeaderGroup.style.display = 'none';
            crewNameGroup.style.display = 'none';
        } else {
            carSelect.removeAttribute('multiple');
            crewLeaderGroup.style.display = 'block';
            crewNameGroup.style.display = 'block';
        }

        // Fetch drivers based on selected cars for event missions
        carSelect.addEventListener('change', function () {
            const selectedCars = Array.from(carSelect.selectedOptions).map(option => option.value);
            const driverSelect = document.getElementById('driver_id');
            driverSelect.innerHTML = '<option value="">Select a driver</option>'; // Reset driver options

            if (selectedCars.length > 0) {
                fetch(`/api/drivers-by-cars`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ cars: selectedCars })
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(driver => {
                        const option = document.createElement('option');
                        option.value = driver.id;
                        option.textContent = driver.nom;
                        driverSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching drivers:', error));
            }
        });
    });
</script>

@endsection