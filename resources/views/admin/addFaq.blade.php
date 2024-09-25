
@extends('admin.dash')

@section('admin') 

<style>
   div .form-control{background-color:transparent}
</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 ">
<div class="card">
  <div class="card-body ">

                    <h6 class="card-title fs-4">Ajouter FAQ</h6>
                    <hr>

                    <form action="{{route('save.faq')}}" method="post" class="forms-sample">
                    @csrf
                        <div  class="mb-3">
                            <label  for="exampleInputUsername1" class="form-label ">QUESTION</label>
                            <input name="question" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" >
                        </div>
                       
                        <div class="mb-3">
                            <label class="form-label">reponse</label>
                            <textarea class="form-control" name="reponse" rows="3" placeholder="Entrez la reponse"></textarea>
                        </div>
                      
                        <button type="submit" class="btn btn-inverse-primary me-2">Soumettre</button>
                        <button class="btn btn-inverse-secondary">Annuler</button>
                    </form>

  </div>
</div>
        </div>
    </div>
</div>
@endsection