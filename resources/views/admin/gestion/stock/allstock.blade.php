@extends('admin.dash')

@section('admin') 

<div class="page-content">

 
    <nav class="page-breadcrumb">
      <ol class="breadcrumb">
        <a href="{{ route('import.stock') }}" class="btn btn-inverse-info">Importer depuis Excel</a>
        &nbsp;&nbsp;&nbsp;
        <a href="{{ route('export.stock') }}" class="btn btn-inverse-info">Exporter vers Excel</a>
      </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card bg-transparent ">
  <div class="card-body">
    <h6 class="card-title  fs-4">Articles stock</h6>
    <hr>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>element</th>
            <th>quantité</th>
            <th>prix unitaire</th>
            <th>prix total</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>
        @foreach($stock as $key => $item )
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item ->category}}</td>
            <td>{{$item ->quantity}}</td>
            <td>{{$item ->price}}</td>
            <td>{{$item ->prix_total}}</td>
            <td>
                <a class="btn btn-danger" href="{{ route('delete.stock', $item->id) }}" id="delete">Supprimer</a>
                <a class="btn btn-success" href="{{ route('edit.stock', $item->id)}}">Editer</a>
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