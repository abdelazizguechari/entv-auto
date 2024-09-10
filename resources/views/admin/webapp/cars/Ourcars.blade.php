





@extends('admin.dash')

@section('admin') 





<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
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
              <a  class="btn btn-inverse-danger btn-icon" href="{{ route('delete.car',
              ['immatriculation' => $item->immatriculation]) }}" id="delete">  <i data-feather="trash"> </i></a>


              <a class="btn btn-inverse-info btn-icon" href="{{ route('edit.car',
               ['immatriculation' => $item->immatriculation]) }}"> <i data-feather="edit"> </i></a>

                  <a href="{{ route('cars.details',['immatriculation' => $item->immatriculation])}}" class="btn btn-inverse-success btn-icon"><i data-feather="eye"> </i></a> 
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
