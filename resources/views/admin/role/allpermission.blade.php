





@extends('admin.dash')

@section('admin') 





<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.permission')}}" class="btn btn-inverse-info"> Add permission</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">TABLEAU DES permission</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>permission name</th>
            <th>group name</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

          



        @foreach($permission as $key => $item )
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item ->name}}</td>
            <td>{{$item ->group_name}}</td>
            <td> <a class="btn btn-danger"  href="{{route('delate.permission',$item->id)}}" id="delete">supprimer</a>
                <a class="btn btn-success" href="{{route('edit.permission',$item->id)}}">Edit</a></td>
            
             

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
