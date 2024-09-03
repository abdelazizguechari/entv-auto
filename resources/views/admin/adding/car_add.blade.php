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
            <div class="card  bg-transparent">
                <div class="card-body bg-dark">
                    <h4 class="card-title  fs-4">Formulaire de Voiture</h4>
                    <hr>
                    <form method="POST" action="{{ route('car.store') }}">

                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label ">Immatriculation</label>
                                    <input type="text" class="form-control" name="immatriculation" placeholder="Entrez l'immatriculation" required>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Marque</label>
                                    <input type="text" class="form-control" name="marque" placeholder="Entrez la marque">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Modèle</label>
                                    <input type="text" class="form-control" name="modele" placeholder="Entrez le modèle">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">État</label>
                                    <input type="text" class="form-control" name="etat" placeholder="Entrez l'état">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Kilométrage</label>
                                    <input type="number" class="form-control" name="kilometrage" placeholder="Entrez le kilométrage" min="0">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <!-- Assurance Type and Next Assurance Date Fields -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Type d'Assurance</label>
                                    <input type="text" class="form-control" name="assurance_type" placeholder="Entrez le type d'assurance">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Prochaine Date d'Assurance</label>
                                    <input type="date" class="form-control" name="next_assurance_date">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Date de Fabrication</label>
                                    <input type="date" class="form-control" name="datem" placeholder="Entrez la date de fabrication">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Couleur</label>
                                    <input type="color" class="form-control" name="couleur" placeholder="Entrez la couleur">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Type de Carburant</label>
                                    <select class="form-select" name="type_carburant">
                                        <option value="essence">Essence</option>
                                        <option value="diesel">Diesel</option>
                                        <option value="électrique">Électrique</option>
                                        <option value="hybride">Hybride</option>
                                        <option value="gaz">Gaz</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Transmission</label>
                                    <input type="text" class="form-control" name="transmission" placeholder="Entrez le type de transmission">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Puissance (CV)</label>
                                    <input type="number" class="form-control" name="puissance" placeholder="Entrez la puissance" min="0">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Nombre de Portes</label>
                                    <input type="number" class="form-control" name="nombre_portes" placeholder="Entrez le nombre de portes" min="0">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Nombre de Places</label>
                                    <input type="number" class="form-control" name="nombre_places" placeholder="Entrez le nombre de places" min="0">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Prix</label>
                                    <input type="text" class="form-control" name="prix" placeholder="Entrez le prix">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Date d'Achat</label>
                                    <input type="date" class="form-control" name="date_achat">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Propriétaire</label>
                                    <input type="text" class="form-control" name="proprietaire" placeholder="Entrez le nom du propriétaire">
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

                        <button type="submit" class="btn btn-primary">Soumettre le Formulaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



		

				
           
				
								
									
					

						
				
			









@endsection