
@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body ">

                    <h6 class="card-title fs-4">Créer une Mission</h6>
                    <hr>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                    <form id="missionForm" action="{{ route('missions.store.mission') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Le sujet de mission </label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mission-type">Type de mission</label>
                                <select class="form-control" id="mission-type" name="mission_type" required>
                                    <option value="" disabled selected>Choisissez un type de mission</option>
                                    <option value="politique">Politique</option>
                                    <option value="ministerial">Ministériel</option>
                                    <option value="sportif">Sportif</option>
                                    <option value="culturel">Culturel</option>
                                    <option value="divertissement">Divertissement</option>
                                    <option value="documentaire">Documentaire</option>
                                </select>
                                </div>
                            </div>

                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Lieu de mission</label>
                                    <input type="text" class="form-control" id="name" name="lieu_mission" required>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="crew_leader">Chef d'Équipe</label>
                                    <input type="text" class="form-control" id="crew_leader" name="crew_leader">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="crew_name">Nom de l'Équipe</label>
                                    <input type="text" class="form-control" id="crew_name" name="crew_name">
                                </div>
                            </div>

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
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fuel_tokens">Jetons de Carburant</label>
                                    <input type="number" class="form-control" id="fuel_tokens" name="fuel_tokens">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="distance">Distance</label>
                                    <input type="number" class="form-control" id="distance" name="distance">
                                </div>
                            </div>

                            <div class="form-group">
                            <label for="car_id">Voiture</label>
                            <select class="form-control @error('car_id') is-invalid @enderror" id="car_id" name="car_id" required>
                                <option value="">Sélectionnez une voiture</option>
                                @if(!empty($cars) && $cars->count())
                                    @foreach($cars as $car)
                                        <option value="{{ $car->immatriculation }}" {{ old('car_id') == $car->immatriculation ? 'selected' : '' }}>{{ $car->immatriculation }}</option>
                                    @endforeach
                                @else
                                    <option value="">Aucune voiture disponible</option>
                                @endif
                            </select>
                            @error('car_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            
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
                    
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        @if($fromEvent)
                            <input type="hidden" name="event_id" value="{{ $eventId }}">
                            <button type="submit" class="btn btn-secondary" name="action" value="add_to_event">Ajouter à l'Événement</button>
                            <button type="button" class="btn btn-primary" onclick="goToEventsPage()">Voir les Événements</button>
                        @else
                            <button type="submit" class="btn btn-primary" name="action" value="create">Créer la Mission</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function goToEventsPage() {
        window.location.href = "{{ route('events.index') }}";
    }
</script>
@endsection
