





@extends('admin.dash')

@section('admin') 





<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.role')}}" class="btn btn-inverse-info"> Add role</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body bg-dark">
    <h6 class="card-title">TABLEAU DES role</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>role name</th>
   
            <th>action</th>
          
          </tr>
        </thead>
        <tbody>

          



        @foreach($role as $key => $item )
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item -> name}}</td>
            <td> <a class="btn btn-danger btn-icon"  href="{{route('delate.role',$item->id)}}" id="delete"><i data-feather="trash"></i></a>

                <a class="btn btn-info btn-icon" href="{{route('edit.role',$item->id)}}"><i data-feather="edit"></a>
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
