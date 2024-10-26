@extends('admin.dash')

@section('admin') 
<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card bg-transparent ">
  <div class="card-body ">
    <h6 class="card-title  fs-4">Couts des maintenances</h6>
    <hr>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Car Immatriculation</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

        @foreach($data as $key => $item )
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{ $item->immatriculation }}</td>
                                   
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->total_cost }}</td>
            <td>
                <a class="btn btn-inverse-primary" href="{{ route('maintenance.print', $item->id) }}">Details</a>
                <a class="btn btn btn-inverse-danger" href="{{ route('maintenace.gestion', $item->id) }}">fin mnt</a>

</td>
          </tr>

          @endforeach 
    
        </tbody>
      </table>
    </div>
    <button onclick="window.print()" class="btn btn-inverse-primary mt-3">Imprimer la Page</button>
  </div>
</div>
        </div>
    </div>

</div>
@endsection