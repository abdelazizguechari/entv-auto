<style>
    .form-control {
        background-color: transparent !important;
    }
    
    select.form-control option {
        background-color: #060C17;
        color: #fff; /* Pour garantir la lisibilité du texte */
    }
</style>


@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body bg-dark">
                    <h6 class="card-title fs-4">Créer une Mission d'Événement</h6>
                    <hr>
                    <form id="eventForm" action="{{ route('missions.store.events') }}" method="POST">
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
                                    <label for="event_end">Fin de l'Événement</label>
                                    <input type="datetime-local" class="form-control" id="event_end" name="event_end">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="event_start">Début de l'Événement</label>
                                    <input type="datetime-local" class="form-control" id="event_start" name="event_start">
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group mt-3 mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer l'Événement</button>
                        <button type="button" class="btn btn-secondary" onclick="submitFormAndAddMission()">Ajouter une Mission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitFormAndAddMission() {
        const form = document.getElementById('eventForm');
        const action = form.action;
        form.action = action + '?redirect_to_add_mission=true';
        form.submit();
    }
</script>

@endsection
    