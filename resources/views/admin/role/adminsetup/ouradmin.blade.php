





@extends('admin.dash')

@section('admin') 





<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body bg-dark">
    <h6 class="card-title fs-4">TABLEAU DES ADMIN</h6>
    <hr>
    <div class="table-responsive">
      <table  class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>email</th>
            <th>phone</th>
            <th>mat</th>
            <th>role</th>
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

          



        @foreach( $alladmin as $key => $item )
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item -> firstname}}</td>
            <td>{{$item -> email}}</td>
            <td>{{$item -> phone}}</td>
            <td>{{$item -> mat}}</td>
            <td>

@foreach ($item->roles as $role)
    <span class="bage bage bage-pill bg-danger p-1 ">{{$role->name}}</span>
@endforeach
            </td>

            <td> <a class="btn btn-danger"  href="{{route('delate.admin',$item->id)}}" id="delete">supprimer</a>
                <a class="btn btn-success" href="{{route('edit.admin',$item->id)}}">Edit</a></td>
            
             

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
