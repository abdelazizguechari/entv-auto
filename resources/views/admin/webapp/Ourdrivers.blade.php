@extends('admin.dash')

@section('admin') 

<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card bg-transparent ">
  <div class="card-body">
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
               
              <a class="btn btn-inverse-info btn-icon" href="{{ route('edit.driver', $item->id) }}" title="Éditer le conducteur">
                <i data-feather="edit"></i>
            </a>
            
            <a   href="{{ route('conducteur.conge', $item->id) }}" title="Conducteur en congé">
                <i data-feather="battery-charging"></i>
            </a>
            
            <a href="{{ route('driver.qtr', $item->id) }}" type="submit" class="btn btn-inverse-warning btn-icon" title="Signaler le conducteur">
                <i data-feather="alert-triangle"></i>
            </a>
            
            <a href="{{ route('driver.detailes', $item->id) }}" type="submit" class="btn btn-inverse-secondary btn-icon" title="Voir les détails">
                <i data-feather="eye"></i>
            </a>
            
            <a class="btn btn-inverse-danger btn-icon" href="{{ route('delete.driver', $item->id) }}" id="delete" title="Supprimer le conducteur">
                <i data-feather="trash"></i>
            </a>
            
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