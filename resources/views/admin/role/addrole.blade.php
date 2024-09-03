
@extends('admin.dash')

@section('admin') 


<div class="page-content">
        


    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">

                    <h6 class="card-title">Add role</h6>

                    <form action="{{route('save.role')}}" method="post" class="forms-sample">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">role name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" >
                        </div>
                       
                       
                      
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

  </div>
</div>
        </div>
    </div>
</div>





@endsection