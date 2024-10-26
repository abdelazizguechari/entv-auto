@extends('admin.dash')

@section('admin')

<div class="page-content">
    @foreach($missions as $date => $missionsByDate)
    <h6 class="fs-5">{{ $date }}</h6>
    <hr>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
           
            <div class="card">
              
                <div class="card-body">
                   
                    <h6 class="card-title fs-4">Missions </h6>
                    <hr>
                    
                    @php
                        // Translation array
                        $statusTranslations = [
                            'ongoing' => 'En cours',
                            'scheduled' => 'Planifié',
                            'completed' => 'Terminé',
                        ];
                    @endphp
                   

                        <table class="table" id="dataTableExample">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mission Start</th>
                                    <th>Mission End</th>
                                    <th>Status</th>
                                    <th>Cars</th>
                                    <th>Drivers</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($missionsByDate as $key => $mission)
                                    @if($mission->type != 'transportation')
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $mission->name }}</td>
                                            <td>{{ $mission->mission_start }}</td>
                                            <td>{{ $mission->mission_end }}</td>
                                            <td>
                                                @php
                                                    // Translate status
                                                    $status = $mission->status;
                                                    echo $statusTranslations[$status] ?? $status;
                                                @endphp
                                            </td>
                                            <td>{{ $mission->car->immatriculation ?? 'N/A' }}</td>
                                            <td>{{ $mission->driver->nom ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('missions.edit', ['id' => $mission->id]) }}" class="btn btn-inverse-info btn-icon"><i data-feather="edit"></i></a>
                                                <a href="{{ route('missions.archive', ['id' => $mission->id]) }}" class="btn btn-inverse-success btn-icon"><i data-feather="archive"></i></a>
                                                <a href="{{ route('missions.deleted', ['id' => $mission->id]) }}" class="btn btn-inverse-danger btn-icon" id="delete">
                                                   
                                                    <i data-feather="trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

