@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-4">Missions</h6>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mission Start</th>
                                <th>Mission End</th>
                                <th>Status</th>
                                <th>Distance</th>
                                <th>Cars</th>
                                <th>Drivers</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($missions as $mission)
                                @if($mission->type != 'transportation')
                                    <tr>
                                        
                                        <td>{{ $mission->name }}</td>
                                        <td>{{ $mission->mission_start }}</td>
                                        <td>{{ $mission->mission_end }}</td>
                                        <td>{{ $mission->status }}</td>
                                        <td>{{ $mission->distance }}</td>
                                        <td>{{ $mission->car->immatriculation ?? 'N/A' }}</td>  
                                        <td>{{ $mission->driver->nom ?? 'N/A' }}</td> 
                                        <td>
                                            <a href="{{ route('missions.edit', ['id' => $mission->id]) }}" class="btn btn-inverse-info btn-icon"><i data-feather="edit"> </i></a>
                                            <form action="{{ route('missions.destroy', ['id' => $mission->id]) }}" method="POST" style="display:inline-block;">  
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-inverse-danger btn-icon" id="delete"><i data-feather="trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection