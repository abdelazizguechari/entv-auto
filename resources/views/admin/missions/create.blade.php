@extends('admin.dash')

@section('admin')
    <h1>Create New Mission</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.missions.store') }}" method="POST">
        @csrf

        <div>
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="transportation">Transportation</option>
                <option value="mission">Mission</option>
                <option value="evenements">Events</option>
            </select>
        </div>

        <div>
            <label for="name">Name:</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="mission_start">Start Date:</label>
            <input id="mission_start" name="mission_start" type="datetime-local" value="{{ old('mission_start') }}">
        </div>

        <div>
            <label for="mission_end">End Date:</label>
            <input id="mission_end" name="mission_end" type="datetime-local" value="{{ old('mission_end') }}">
        </div>

        <div id="crew-leader-field" style="display:none;">
            <label for="crew_leader">Crew Leader:</label>
            <input id="crew_leader" name="crew_leader" type="text" value="{{ old('crew_leader') }}">
        </div>

        <div id="crew-name-field" style="display:none;">
            <label for="crew_name">Crew Name:</label>
            <input id="crew_name" name="crew_name" type="text" value="{{ old('crew_name') }}">
        </div>
        <div>
            <label for="fuel_tokens">Fuel Tokens:</label>
            <input id="fuel_tokens" name="fuel_tokens" type="number" value="{{ old('fuel_tokens') }}">
        </div>


        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="" disabled selected>Select status</option>
                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div id="car-field" style="display:block;">
            <label for="car_id">Car:</label>
            <select id="car_id" name="car_id">
                <option value="">Select Car</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->marque }} - {{ $car->immatriculation }}</option>
                @endforeach
            </select>
        </div>

        <div id="multiple-cars-field" style="display:none;">
            <label for="car_ids">Cars:</label>
            <select id="car_ids" name="car_ids[]" multiple style="height: 100px;">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->marque }} - {{ $car->immatriculation }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create Mission</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeElement = document.getElementById('type');
            const crewLeaderField = document.getElementById('crew-leader-field');
            const crewNameField = document.getElementById('crew-name-field');
            const carField = document.getElementById('car-field');
            const multipleCarsField = document.getElementById('multiple-cars-field');

            typeElement.addEventListener('change', function() {
                const type = this.value;

                crewLeaderField.style.display = 'none';
                crewNameField.style.display = 'none';
                carField.style.display = 'block';
                multipleCarsField.style.display = 'none';

                if (type === 'mission' || type === 'evenements') {
                    crewLeaderField.style.display = 'block';
                    crewNameField.style.display = 'block';
                }

                if (type === 'evenements') {
                    carField.style.display = 'none';
                    multipleCarsField.style.display = 'block';
                }
            });
        });
    </script>

@endsection