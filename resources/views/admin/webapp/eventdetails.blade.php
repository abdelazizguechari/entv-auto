@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-4">Détails de l'Événement</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nom:</strong> {{ $event->name }}</p>
                            <p><strong>Début de l'Événement:</strong> {{ $event->event_start }}</p>
                            <p><strong>Fin de l'Événement:</strong> {{ $event->event_end }}</p>
                            <p><strong>Description:</strong> {{ $event->description }}</p>
                        </div>
                    </div>
                    <h6 class="card-title fs-4">Missions associées</h6>
                    @if($event->missions->count() > 0)
                        <ul>
                            @foreach($event->missions as $mission)
                                <li>
                                    <strong>Nom de la Mission:</strong> {{ $mission->name }}<br>
                                    <strong>Type:</strong> {{ $mission->mission_type }}<br>
                                    <strong>Lieu:</strong> {{ $mission->lieu_mission }}<br>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Aucune mission associée à cet événement.</p>
                    @endif
                    <a href="{{ route('events.index') }}" class="btn btn-primary">Retour aux Événements</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection