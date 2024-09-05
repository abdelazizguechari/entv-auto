
@extends('admin.dash')

@section('admin') 


<div class="page-content">
        
    <a href="{{route('export')}}" class="btn btn-inverse-danger mb-3"> import from excele</a> 
    <div class="card">
        <div class="card-body">

    


                    <h6 class="card-title fs-5">Add role</h6>
                    <hr> 

                    <form action="{{route('save.role')}}" method="post" class="forms-sample">
                    @csrf

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Xlsx import</label>
                            <input name="import" type="file" class="form-control" id="exampleInputUsername1" autocomplete="off" >
                        </div>
                       
                       
                      
                        <button type="submit" class="btn btn-inverse-warning me-2">Uplode</button>
                      
                    </form>

 
        </div>
    </div>
</div>





@endsection