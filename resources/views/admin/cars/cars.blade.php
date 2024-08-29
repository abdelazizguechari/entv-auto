@extends('admin.dash')

@section('admin') 
    <div class="container">
        <h1>Car List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Immatriculation</th>
                    <th>Marque</th>
                    <th>Modele</th>
                    <th>Etat</th>
                    <th>Kilometrage</th>
                    <th>Couleur</th>
                    <th>Type Carburant</th>
                    <th>Nombre de Places</th>
                    <th>Driver Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->immatriculation }}</td>
                        <td>{{ $car->marque }}</td>
                        <td>{{ $car->modele }}</td>
                        <td>{{ $car->etat }}</td>
                        <td>{{ $car->kilometrage }}</td>
                        <td>{{ $car->couleur }}</td>
                        <td>{{ $car->type_carburant }}</td>
                        <td>{{ $car->nombre_places }}</td>
                        <td>{{ $car->driver ? $car->driver->name : 'Unassigned' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
