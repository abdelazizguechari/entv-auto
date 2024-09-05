<style>
    .form-control {
        background-color: transparent !important;
    }
    
    select.form-control option {
        background-color: #060C17;
        color: #fff; /* To ensure the text is readable */
    }
</style>

@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card bg-transparent">
                <div class="card-body bg-dark">
                    <h6 class="card-title fs-4">Créer une Mission de Transport</h6>
                    <hr>
                    <form action="{{ route('missions.store.transportation') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mission_start">Début de la Mission</label>
                                    <input type="datetime-local" class="form-control" id="mission_start" name="mission_start">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mission_end">Fin de la Mission</label>
                                    <input type="datetime-local" class="form-control" id="mission_end" name="mission_end">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Statut</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="ongoing">En cours</option>
                                        <option value="scheduled">Planifiée</option>
                                        <option value="completed">Terminée</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fuel_tokens">Jetons de Carburant</label>
                                    <input type="number" min="0" class="form-control" id="fuel_tokens" name="fuel_tokens">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="distance">Distance</label>
                                    <input type="number" min="0" class="form-control" id="distance" name="distance">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="car_id">Voiture</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                <option value="">Sélectionnez une voiture</option>
                                @if(!empty($cars) && $cars->count())
                                    @foreach($cars as $car)
                                        <option value="{{ $car->immatriculation }}">{{ $car->immatriculation }}</option>
                                    @endforeach
                                @else
                                    <option value="">Aucune voiture disponible</option>
                                @endif
                            </select>

                            <div class="form-group mb-3 mt-3">
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
