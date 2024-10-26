@extends('admin.dash')
@section('admin')


<div class="page-content">
    <div class="card">
        <div class="card-body">
            <div class="card-title">cree un section</div>
            <form action="{{route('create.section')}}" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">nom de section</label>
                        <input type="text" name="nom" id="name" placeholder="ajouter le nom de section">
                    </div>
                    <div class="col-md-4">
                        <label for="number">number employés</label>
                        <input type="number" name="nb_employes" id="number" placeholder="ajouter le number des employes" >
                    </div>
                    <div class="col-md-4">
                        <label for="responsable"></label>
                        <input type="text" name="responsable" id="responsable" placeholder="enter le nom de responcable de departemon">
                    </div>
                </div>
                    
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <label for="localisation">localisation</label>
                        <input type="localisation" name="localisation"  id="localisaton" placeholder="ajouter la localisation de section">
                    </div>
                            
                    <div class="col-md-4">
                        <label for="email"></label>
                        <input type="text" name="email" id="email" placeholder="ajouter email de section">
                    </div>

                    <div class="col-md-4">
                        <label for="phone"></label>
                        <input type="text" name="email" id="phone" placeholder="ajouter phone de section">
                    </div>
                </div>
                <input type="submit" class="btn btn-inverse-primery" value="ajouter un section">
            </div>
        </div>
    </div>
</div>


@endsection