@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Car</h6>
                    <form action="{{ route('cars.update', ['immatriculation' => $car->immatriculation]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="immatriculation">Immatriculation</label>
                            <input type="text" class="form-control" id="immatriculation" name="immatriculation" value="{{ $car->immatriculation }}" required>
                        </div>
                        <div class="form-group">
                            <label for="modele">Modele</label>
                            <input type="text" class="form-control" id="modele" name="modele" value="{{ $car->modele }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kilometrage">Kilometrage</label>
                            <input type="number" class="form-control" id="kilometrage" name="kilometrage" value="{{ $car->kilometrage }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type_carburant">Type Carburant</label>
                            <input type="text" class="form-control" id="type_carburant" name="type_carburant" value="{{ $car->type_carburant }}" required>
                        </div>
                        <div class="form-group">
                            <label for="driver_id">Driver</label>
                            <select class="form-control" id="driver_id" name="driver_id">
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ $car->driver_id == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Car</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection