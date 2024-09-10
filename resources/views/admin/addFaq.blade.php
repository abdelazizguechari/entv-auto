
@extends('admin.dash')

@section('admin') 

<style>
   div .form-control{background-color:transparent}
</style>

<div class="page-content">
        


    <div class="row">
        <div class="col-md-12 ">
<div class="card">
  <div class="card-body bg-dark">

                    <h6 class="card-title fs-4">Add FAQ</h6>
                    <hr>

                    <form action="{{route('save.faq')}}" method="post" class="forms-sample">
                    @csrf
                        <div  class="mb-3">
                            <label  for="exampleInputUsername1" class="form-label ">QUESTION</label>
                            <input name="question" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" >
                        </div>
                       
                        <div class="mb-3">
                            <label class="form-label">reponse</label>
                            <textarea class="form-control" name="reponse" rows="3" placeholder="Entrez la description"></textarea>
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