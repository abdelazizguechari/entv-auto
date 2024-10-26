
@extends('admin.dash')

@section('admin') 


<div class="page-content">
        


    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">

                    <h6 class="card-title">modifier Permission</h6>

                    <form action="{{route('update.permission')}}" method="post" class="forms-sample">
                    @csrf

                    <input type="hidden" name="id" value="{{$edit->id}}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">nom Permission</label>
                            <input name="name" type="text" value="{{$edit->name}}" class="form-control" id="exampleInputUsername1" autocomplete="off" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Groupe</label>
                            <select  value="{{$edit->group_name}}" name="group_name" class="form-select" id="exampleFormControlSelect1">
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
                       
                      
                        <button type="submit" class="btn btn-primary me-2">Soumettre</button>
                        <button class="btn btn-secondary">Annuler</button>
                    </form>

  </div>
</div>
        </div>
    </div>
</div>





@endsection