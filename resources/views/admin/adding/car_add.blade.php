@extends('admin.dash')

@section('admin')



<div class="page-content">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h4 class="card-title fs-4">Formulaire de Voiture</h4>
                    <hr>

                       
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('car.store') }}">

                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Immatriculation</label>
                                    <input type="text" class="form-control" name="immatriculation" placeholder="Entrez l'immatriculation" required>
                                    @error('immatriculation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Marque</label>
                                    <select class="form-select" id="marque" name="marque" required>
                                        <option value="">Sélectionnez la marque</option>
                                        <option value="1" data-models='["A3","A4","A6","Q3","Q5"]'>Audi</option>
                                        <option value="2" data-models='["Golf","Passat","Tiguan","Arteon","Jetta"]'>Volkswagen</option>
                                        <option value="3" data-models='["320i","330i","X5","X3","M3"]'>BMW</option>
                                        <option value="4" data-models='["Civic","Accord","CR-V","Fit","Pilot"]'>Honda</option>
                                        <option value="5" data-models='["Mustang","F-150","Explorer","Escape","Bronco"]'>Ford</option>
                                        <option value="6" data-models='["Camry","Corolla","RAV4","Highlander","Tacoma"]'>Toyota</option>
                                        <option value="7" data-models='["Santa Fe","Tucson","Elantra","Kona","Sonata"]'>Hyundai</option>
                                        <option value="8" data-models='["Soul","Sportage","Optima","Stinger","Forte"]'>Kia</option>
                                        <option value="9" data-models='["A-Class","C-Class","E-Class","S-Class","GLA"]'>Mercedes-Benz</option>
                                        <option value="10" data-models='["Impreza","Outback","Forester","Legacy","Ascent"]'>Subaru</option>
                                        <option value="11" data-models='["Altima","Maxima","Rogue","Murano","Sentra"]'>Nissan</option>
                                        <option value="12" data-models='["Mazda3","Mazda6","CX-5","MX-5","CX-9"]'>Mazda</option>
                                        <option value="13" data-models='["Charger","Challenger","Durango","Journey","Ram"]'>Dodge</option>
                                        <option value="14" data-models='["2500","3500","Ram","Power Wagon","Rebel"]'>Ram</option>
                                        <option value="15" data-models='["911","Cayenne","Macan","Panamera","Taycan"]'>Porsche</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Modèle</label>
                                    <select class="form-select" id="modele" name="modele" required>
                                        <option value="">Sélectionnez le modèle</option>
                                        <!-- Options will be dynamically populated based on the selected marque -->
                                    </select>
                                
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">État</label>
                                    <select class="form-select" name="etat">
                                        <option value="neuf">Neuf</option>
                                        <option value="comme_neuf">Comme Neuf</option>
                                        <option value="bon_etat">Bon État</option>
                                        <option value="etat_moyen">État Moyen</option>
                                        <option value="usagé">Usagé</option>
                                        <option value="à_réparer">À Réparer</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Kilométrage</label>
                                    <input type="number" class="form-control" name="kilometrage" placeholder="Entrez le kilométrage" min="0">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Type d'Assurance</label>
                                    <select class="form-select" name="assurance_type">
                                        <option value="au_tiers">Au Tiers</option>
                                        <option value="tiers_complet">Tiers Complet</option>
                                        <option value="tous_risques">Tous Risques</option>
                                        <option value="assurance_vol">Assurance Vol</option>
                                        <option value="assurance_incendie">Assurance Incendie</option>
                                        <option value="assurance_sans_jeune_conducteur">Assurance Sans Jeune Conducteur</option>
                                    </select>
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
                                    <select class="form-select" name="transmission" required>
                                        <option value="">Sélectionnez la transmission</option>
                                        <option value="manuelle">Manuelle</option>
                                        <option value="automatique">Automatique</option>
                                        <option value="semi-automatique">Semi-Automatique</option>
                                        <option value="CVT">CVT (Continuously Variable Transmission)</option>
                                        <option value="dual-clutch">Double Embrayage</option>
                                    </select>
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

                        <button type="submit" class="btn btn-inverse-primary">Soumettre le Formulaire</button> &nbsp;
                        <button type="reset" value="Reset" class="btn btn-inverse-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const marqueSelect = document.getElementById('marque');
        const modeleSelect = document.getElementById('modele');
    
        marqueSelect.addEventListener('change', function() {
            const selectedOption = marqueSelect.options[marqueSelect.selectedIndex];
            const models = JSON.parse(selectedOption.getAttribute('data-models') || '[]');
    
            // Clear existing model options
            modeleSelect.innerHTML = '<option value="">Sélectionnez le modèle</option>';
    
            models.forEach(model => {
                const option = document.createElement('option');
                option.value = model;
                option.textContent = model;
                modeleSelect.appendChild(option);
            });
        });
    });
    </script>