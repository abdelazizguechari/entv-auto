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
            <th>nom de mission</th>
            <th>mission debut</th>
            <th>mission fin</th>
            <th>voiture immatriculation</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

        @foreach($archives  as $key => $item )
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item ->name}}</td>
            <td>{{$item ->mission_start}}</td>
            <td>{{$item ->mission_end}}</td>
            <td>{{$item ->status}}</td>
            <td>
               
    
            
            <a href="{{ route('missionachiv.detailes', $item->id) }}" type="submit" class="btn btn-inverse-secondary btn-icon" title="Voir les détails">
                <i data-feather="eye"></i>
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