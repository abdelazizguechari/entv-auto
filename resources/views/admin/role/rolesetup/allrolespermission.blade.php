@extends('admin.dash')

@section('admin') 





<div class="page-content">

    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Gestion des roles</h6>    
    <div class="table-responsive">
      <table  class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>role name</th>
            <th>permission name</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

          



        @foreach($roles as $key => $item )
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item -> name}}</td>


<td>
    @foreach ($item->permissions as $perm)

    <span class="badge p-2 bg-danger">{{$perm->name}}</span>


    @endforeach
</td>

            



            <td> <a class="btn btn-danger"  href="{{route('admin.delete.role',$item->id)}}" id="delete">supprimer</a>
      <a class="btn btn-success" href="{{route('admin.edit.role',$item->id)}}">Edit</a></td>
            
             

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
