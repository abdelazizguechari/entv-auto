@extends('admin.dash')

@section('admin') 
<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card ">
  <div class="card-body ">
    <h6 class="card-title  fs-4">Vehicules en maintenance</h6>
    <hr>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>immatriculation</th>
            <th>Nom du Conducteur</th>
            <th>Début de maintenance</th>
            <th>categorie panne</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $item )
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item ->immatriculation}}</td>


            @if (empty($item ->driver_name) )
               {{'voiteur without drivers'}}
            @else
               {{$item ->driver_name}} 
            @endif
                       
            <td>{{$item ->driver_name }}</td>
            <td>{{$item ->start_date}}</td>
            <td>{{$item ->categorie_panne}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('maintenance.print', $item->id) }}"><i data-feather="download"></i></a>
                <a class="btn btn-success" href="{{ route('complete.maintenance', $item->id) }}">Completer Maintenance</a>

</td>
          </tr>

          @endforeach 
    
        </tbody>
      </table>
    </div>
    <button onclick="window.print()" class="btn btn-primary mt-3">Imprimer la Page</button>
  </div>
</div>
        </div>
    </div>

</div>
@endsection
