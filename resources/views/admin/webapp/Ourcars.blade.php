





@extends('admin.dash')

@section('admin') 





<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card bg-transparent ">
            <div class="card-body bg-dark">
    <h6 class="card-title  fs-5">TABLEAU DES VOITURES</h6>
    <hr>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>immatriculation</th>
            <th>modele</th>
            <th>kilometrage</th>
            <th>type carburant</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

          @php
          $car = App\Models\Carsm::where('status', 'active')->latest()->get();    
          @endphp
          

        @foreach($car as $key => $item )
          <tr>
            <td>{{$item -> immatriculation}}</td>
            <td>{{$item -> modele}}</td>
            <td>{{$item -> kilometrage}}</td>
            <td>{{$item -> type_carburant}}</td>
            <td>
              <a  class="btn btn-danger " href="{{ route('delete.car',
              ['immatriculation' => $item->immatriculation]) }}" id="delete">supprimer</a>
              <a class="btn btn-success" href="{{ route('edit.car',
               ['immatriculation' => $item->immatriculation]) }}">Edit</a>
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
