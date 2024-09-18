@extends('admin.dash')

@section('admin') 

<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card bg-transparent ">
  <div class="card-body ">
    <h6 class="card-title  fs-4">Archive des maintenances</h6>
    <hr>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
           
            <th>Début maintenance</th>
            <th>fin de maintenance</th>
            <th>categorie de panne</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

        @foreach($Marchive as $key => $item )
          <tr>
            <td>{{$key + 1}}</td>
           
            <td>{{$item ->start_date}}</td>
            <td>{{$item ->end_date}}</td>
            <td>{{$item ->categorie_panne}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('maintenance.print', $item->id) }}"><i data-feather="eye"> </i></a>
                {{-- <a class="btn btn-success" href="{{ route('complete.maintenance', $item->id) }}">Completer Maintenance</a> --}}

</td>
          </tr>

          @endforeach 
    
        </tbody>
      </table>
    </div>
    <button id="delete" onclick="window.print()" class="btn btn-inverse-danger mt-3">suprimer tout</button>
  </div>
</div>
        </div>
    </div>

</div>





@endsection
