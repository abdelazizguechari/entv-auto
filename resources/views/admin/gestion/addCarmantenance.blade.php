@extends('admin.dash')

@section('admin')

<style>
.form-control {
    background-color: transparent !important;
}
</style>

<div class="page-content">
        <div class="col-md-12 stretch-card">
            <div class="card bg-transparent">
                <div class="card-body ">
                    <h4 class="card-title fs-4">Formulaire de Maintenance</h4>
                    <hr>
                    <form method="POST" action="{{ route('maintenance.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Immatriculation</label>
                                    <input type="text" class="form-control" name="immatriculation" value="{{ $car->immatriculation }}" required  readonly>
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Chauffeur</label>
                                    <input type="text" class="form-control" name="chauffeur" value="{{  $chauffeur->nom ?? 'N/A' }}" readonly>
                                    <input type="hidden" name="driver_id" value="{{$chauffeur->id ?? null}}" >
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">la catégorie de panne</label>
                                        <select  class="form-control" name="categorie_panne" id="categorie_panne" class="form-control">
                                           

                                            <option  value="">Sélectionnez la catégorie de panne</option>
                                            <option  value="moteur">Panne Moteur</option>
                                            <option  value="freins">Panne de Freins</option>
                                            <option  value="transmission">Panne de Transmission</option>
                                            <option  value="electrique">Problème Électrique</option>
                                            <option  value="pneu">Pneu Crevé</option>
                                            <option  value="batterie">Batterie Déchargée</option>
                                            <option  value="autre">Autre</option>
                                       
                                        </select>
                                    </div>
                                </div><!-- Col -->


                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Date de Début de Maintenance</label>
                                        <input type="date" class="form-control" name="start_date" placeholder="Entrez la date de début de maintenance">
                                    </div>
                                </div><!-- Col -->


                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Type de Maintenance</label>
                                        <select  class="form-control" name="maintenance_type">
                                            <option  value="inside">Inside</option>
                                            <option  value="outside">Outside</option>
                                        </select>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="3" placeholder="Entrez la description"></textarea>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                        <button type="submit" class="btn btn-inverse-primary col-sm-3">Soumettre le Formulaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
