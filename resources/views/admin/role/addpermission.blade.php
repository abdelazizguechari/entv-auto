@extends('admin.dash')

@section('admin') 


<div class="page-content">
        
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">

                    <h6 class="card-title">Ajouter une permission</h6>

                    <form action="{{route('store.permission')}}" method="post" class="forms-sample">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Permission</label>
                            <input name="name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Group</label>
                            <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                <option selected disabled>Selection du group</option>
                                <option>permissions voiture</option>
                                <option>permissions conducteur</option>
                                <option>permissions mission</option>
                                <option>permissions transportation</option>
                                <option>permissions evenements</option>
                                <option>permissions archive</option>
                                <option>permissions maintenance</option>
                                <option>permissions tableau de bord</option>
                                 <option>roles & permissions</option>

                            </select>
                        </div>
                       
                      
                        <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                        <button class="btn btn-secondary">Annuler</button>
                    </form>

  </div>
</div>
        </div>
    </div>
</div>





@endsection