@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Créer une Mission de Transport</h6>
                    <form action="{{ route('missions.store.transportation') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="mission_start">Début de la Mission</label>
                            <input type="datetime-local" class="form-control" id="mission_start" name="mission_start">
                        </div>
                        <div class="form-group">
                            <label for="mission_end">Fin de la Mission</label>
                            <input type="datetime-local" class="form-control" id="mission_end" name="mission_end">
                        </div>
                        <div class="form-group">
                            <label for="crew_leader">Chef d'Équipe</label>
                            <input type="text" class="form-control" id="crew_leader" name="crew_leader">
                        </div>
                        <div class="form-group">
                            <label for="crew_name">Nom de l'Équipe</label>
                            <input type="text" class="form-control" id="crew_name" name="crew_name">
                        </div>
                        <div class="form-group">
                            <label for="status">Statut</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="ongoing">En cours</option>
                                <option value="scheduled">Planifiée</option>
                                <option value="completed">Terminée</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fuel_tokens">Jetons de Carburant</label>
                            <input type="number" class="form-control" id="fuel_tokens" name="fuel_tokens">
                        </div>
                        <div class="form-group">
                            <label for="distance">Distance</label>
                            <input type="number" class="form-control" id="distance" name="distance">
                        </div>
                        <div class="form-group">
                            <label for="car_id">Voiture</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                <option value="">Sélectionnez une voiture</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->immatriculation }}">{{ $car->immatriculation }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer la Mission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
