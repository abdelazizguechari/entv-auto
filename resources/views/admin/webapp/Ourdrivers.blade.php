@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Drivers table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Permis Conduire</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Assigned Car</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drivers as $driver)
                                    <tr>
                                        <td>{{ $driver->nom }}</td>
                                        <td>{{ $driver->prenom }}</td>
                                        <td>{{ $driver->permis_conduire }}</td>
                                        <td>{{ $driver->email }}</td>
                                        <td>{{ $driver->telephone }}</td>
                                        <td>{{ $driver->car->immatriculation ?? 'No car assigned' }}</td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('drivers.delete', ['id' => $driver->id]) }}">Supprimer</a>
                                            <a class="btn btn-success" href="{{ route('drivers.edit', ['id' => $driver->id]) }}">Editer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection