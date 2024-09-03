





@extends('admin.dash')

@section('admin') 





<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card bg-transparent ">
  <div class="card-body bg-dark">
    <h6 class="card-title  fs-4">TABLEAU DES chauffeur</h6>
    <hr>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>nom</th>
            <th>prenom</th>
            <th>num telphon</th>
            <th>voiture immatriculation</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

          



        @foreach($drivers as $key => $item )
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item ->nom}}</td>
            <td>{{$item ->prenom}}</td>
            <td>{{$item ->telephone}}</td>
            <td>{{$item ->voiture_id}}</td>
            <td>
                <a class="btn btn-danger" href="{{ route('delete.driver', $item->id) }}" id="delete">Supprimer</a>
            <a class="btn btn-success" href="{{ route('edit.driver', $item->id)}}">Edit</a>
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
