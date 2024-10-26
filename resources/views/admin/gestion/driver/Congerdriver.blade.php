@extends('admin.dash')

@section('admin') 
<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card bg-transparent ">
  <div class="card-body ">
    <h6 class="card-title  fs-4">conducteurs en congé</h6>
    <hr>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Prénom</th>
                <th>Numéro d'Assurance</th>
                <th>Type Congé</th>
                <th>Fin Congé</th>
                <th>Numéro de Téléphone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->prenom }}</td>
                    <td>{{ $item->assurance_num }}</td>
                    <td>{{ $item->type_conger }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>{{ $item->telephone }}</td>
                    <td>

                        <a class="btn btn-danger" href="{{ route('activate.driver', $item->driver_id) }}">terminer</a>
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