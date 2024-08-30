@extends('admin.dash')

@section('admin')

<div class="page-content">

    {{-- <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav> --}}

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Cars table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>immatriculation</th>
                                    <th>modele</th>
                                    <th>kilometrage</th>
                                    <th>type carburant</th>
                                    <th>driver</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cars = App\Models\Car::latest()->get();
                                @endphp

                                @foreach($cars as $car)
                                    <tr>
                                        <td>{{ $car->immatriculation }}</td>
                                        <td>{{ $car->modele }}</td>
                                        <td>{{ $car->kilometrage }}</td>
                                        <td>{{ $car->type_carburant }}</td>
                                        <td>{{ $car->driver->nom ?? 'No driver assigned' }}</td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('cars.delete', ['immatriculation' => $car->immatriculation]) }}">supprimer</a>
                                            <a class="btn btn-success" href="{{ route('cars.edit', ['immatriculation' => $car->immatriculation]) }}">editing</a>
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