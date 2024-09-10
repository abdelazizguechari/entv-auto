

@extends('admin.dash')

@section('admin')

<style>
    .form-control {
        background-color: transparent !important;
    }
</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h6 class="card-title fs-4">Mis a Jour Formulaire du Conducteur</h6>
                    <hr>
                    @if($cars->isEmpty())
                        <div class="alert alert-warning">
                            Aucun véhicule n'est disponible pour l'attribution.
                        </div>
                    @else
                        <form method="post" action="{{ route('update.driver', $driver->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                          

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nom du Conducteur</label>
                                        <input type="text" class="form-control" name="nom" value="{{ old('nom', $driver->nom) }}">
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Prénom du Conducteur</label>
                                        <input type="text" class="form-control" name="prenom" value="{{ old('prenom', $driver->prenom) }}">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Numéro d'Assurance</label>
                                        <input type="text" class="form-control" name="assurance_num" value="{{ old('assurance_num', $driver->assurance_num) }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Numéro de Permis</label>
                                        <input type="text" class="form-control" name="permis_conduire" value="{{ old('permis_conduire', $driver->permis_conduire) }}">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Numéro de Téléphone</label>
                                        <input type="text" class="form-control" name="telephone" value="{{ old('telephone', $driver->telephone) }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Adresse Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email', $driver->email) }}">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" class="form-control" name="adresse" value="{{ old('adresse', $driver->adresse) }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date de Naissance</label>
                                        <input type="date" class="form-control" name="date_naissance" value="{{$driver->date_naissance }}">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sélectionnez une voiture</label>
                                        <select class="form-control" name="voiture_id">
                                            <option style="background-color: black;padding:3px;" value="" disabled>Sélectionnez une voiture</option>
                                            @foreach($cars as $immatriculation)
                                                <option style="background-color: rgb(7, 8, 18)" value="{{ $immatriculation ->immatriculation}}" {{ $driver->voiture_id == $immatriculation ? 'selected' : '' }}>
                                                    {{ $immatriculation ->immatriculation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nom de la Personne à Contacter en Cas d'Urgence</label>
                                        <input type="text" class="form-control" name="nom_cas_urgance" value="{{ old('nom_cas_urgance', $driver->nom_cas_urgance) }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Téléphone de la Personne à Contacter en Cas d'Urgence</label>
                                        <input type="text" class="form-control" name="num_cas_urgance" value="{{ old('num_cas_urgance', $driver->num_cas_urgance) }}">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Téléchargez la Photo du Conducteur</label>
                                        <input type="file" class="form-control" name="photo">
                                        @if($driver->photo)
                                            <img src="{{ asset('storage/' . $driver->photo) }}" alt="Driver Photo" class="mt-2" width="100">
                                        @endif
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            @endif
                            <button type="submit" class="btn btn-inverse-primary">mis a jour les information</button>
                            &nbsp;&nbsp;
                           
                            <a class="btn btn-inverse-info" href="{{route('conducteur.conge', $driver->id)}}">  Ajouter le conducteur en congé </a>    
         &nbsp;&nbsp;
                            <button type="submit" class="btn btn-inverse-danger">Ajouter le conducteur au questionnaire </button>
                        </form>
                 

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
