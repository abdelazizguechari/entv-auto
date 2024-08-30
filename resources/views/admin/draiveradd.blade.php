@php



$cars = App\Models\Car::whereNotIn('immatriculation', App\Models\Driver::pluck('voiture_id'))->pluck('immatriculation');

@endphp

@extends('admin.dash')

@section('admin') 

<div class="page-content">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Formulaire du Conducteur</h6>
                    <form method="post" action="{{route('driver.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom du Conducteur</label>
                                    <input type="text" class="form-control" placeholder="Entrez le nom du conducteur">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Numéro de Permis</label>
                                    <input type="text" class="form-control" placeholder="Entrez le numéro de permis">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

               
                        

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Numéro de Téléphone</label>
                                    <input type="text" class="form-control" placeholder="Entrez le numéro de téléphone">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Adresse Email</label>
                                    <input type="email" class="form-control" placeholder="Entrez l'adresse email">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" class="form-control" placeholder="Entrez l'adresse">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Date de Naissance</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Sélectionnez une voiture</label>
                                    <select class="form-control" name="voiture_id">
                                        <option value="" disabled selected>Sélectionnez une voiture</option>
                                        @foreach($cars as $immatriculation)
                                            <option value="{{ $immatriculation }}">{{ $immatriculation }}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom de la Personne à Contacter en Cas d'Urgence</label>
                                    <input type="text" class="form-control" placeholder="Entrez le nom de la personne à contacter en cas d'urgence">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Téléphone de la Personne à Contacter en Cas d'Urgence</label>
                                    <input type="text" class="form-control" placeholder="Entrez le téléphone de la personne à contacter en cas d'urgence">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Téléchargez la Photo du Conducteur</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <button type="submit" class="btn btn-primary">Soumettre le formulaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
