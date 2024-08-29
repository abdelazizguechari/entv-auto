





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
          
          </tr>
        </thead>
        <tbody>

          
@php
$car = App\Models\Carsm::latest()->get();    
@endphp


        @foreach($car as $key => $item )
          <tr>
            <td>{{$item -> immatriculation}}</td>
            <td>{{$item -> modele}}</td>
            <td>{{$item -> kilometrage}}</td>
            <td>{{$item -> type_carburant}}</td>
            <td>
              <a class="btn btn-danger" href="">supprimer</a>
              <a  class="btn btn-success" href="">editing</a>
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
