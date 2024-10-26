<style>
    .form-control {
        background-color: transparent !important;
    }
    
    select.form-control option {
        background-color: #060C17;
        color: #fff; /* Ensure text is readable */
    }

    .text-danger {
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 0.25em;
    }
</style>

@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-4">Créer Un Événement</h6>
                    <hr>
                    <form id="eventForm" action="{{ route('missions.store.events') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                           

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="event_start">Début de l'Événement</label>
                                    <input type="datetime-local" class="form-control" id="event_start" name="event_start" value="{{ old('event_start') }}">
                                    @if ($errors->has('event_start'))
                                        <span class="text-danger">{{ $errors->first('event_start') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="event_end">Fin de l'Événement</label>
                                    <input type="datetime-local" class="form-control" id="event_end" name="event_end" value="{{ old('event_end') }}">
                                    @if ($errors->has('event_end'))
                                        <span class="text-danger">{{ $errors->first('event_end') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group mt-3 mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <button type="button" class="btn btn-inverse-info" onclick="submitFormAndAddMission()">etape suivante</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitFormAndAddMission() {
        const form = document.getElementById('eventForm');
        const originalAction = form.action;
        form.action = `${originalAction}?redirect_to_add_mission=true`;
        form.submit();
    }
</script>

@endsection
