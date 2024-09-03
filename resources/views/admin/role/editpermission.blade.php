
@extends('admin.dash')

@section('admin') 


<div class="page-content">
        


    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">

                    <h6 class="card-title">edit Permission</h6>

                    <form action="{{route('update.permission')}}" method="post" class="forms-sample">
                    @csrf

                    <input type="hidden" name="id" value="{{$edit->id}}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Permission name</label>
                            <input name="name" type="text" value="{{$edit->name}}" class="form-control" id="exampleInputUsername1" autocomplete="off" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Group name</label>
                            <select  value="{{$edit->group_name}}" name="group_name" class="form-select" id="exampleFormControlSelect1">
                                <option selected disabled>Select group</option>
                                <option>car permission</option>
                                <option>driver permission</option>
                                <option>mission permission</option>
                                <option>transport permission</option>
                                <option>event permission</option>
                                <option>archive permission</option>
                                <option>mantanance permission</option>
                                <option>dashboard permission</option>
                                 <option>role & permission</option>

                            </select>
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