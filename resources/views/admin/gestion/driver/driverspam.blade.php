@extends('admin.dash')

@section('admin') 

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-5">conducteurs en suspension</h6>
                    <hr>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom du conducteur</th>
                                    <th>Raison</th>
                                    <th>Date de signalement</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $driverspam)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $driverspam->driver->nom }} {{ $driverspam->driver->prenom }}</td>
                                        <td>{{ str_replace('_', ' ', $driverspam->raison) }}</td>
                                        <td>{{ $driverspam->date_singler }}</td>
                                        <td>
                                            <a class="btn btn-inverse-info btn-icon" href=""><i data-feather="edit"></i></a>
                                            <a href="" class="btn btn-inverse-success btn-icon"><i data-feather="play"></i></a>
                                            <a href="" class="btn btn-inverse-secondary btn-icon"><i data-feather="eye"></i></a>
                                            
                                            <!-- Delete form -->
                                            <form action="{{ route('signalements.delete', $driverspam->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete" type="submit" class="btn btn-inverse-danger btn-icon" ><i data-feather="trash"></i></button>
                                            </form>
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
