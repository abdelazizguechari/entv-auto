@extends('admin.dash')

@section('admin')

<style>
    .form-control {
        background-color: transparent !important;
        border: none !important;
        padding: 2px 5px;
        font-size: 14px;
     
    }

    .form-control[readonly] {
        cursor: not-allowed;
    }

    .form-label {
        font-size: 14px;
        font-weight: bold;
    }

    .mb-3 {
        margin-bottom: 5px !important; /* Reduce bottom margin */
    }

    /* Reduce margin for rows */
    .row {
        margin-bottom: 5px !important;
    }

    /* Remove card padding */
    .card-body {
        padding: 10px !important;
    }

    /* Adjust card max-width */
    .card {
        max-width: 800px;
        margin: 0 auto;
    }

    /* Optional: Adjust form element layout */
    .form-group {
        display: flex;
        align-items: center;
    }

    .form-group label {
        flex-basis: 30%;
    }

    .form-group input, .form-group textarea {
        flex-basis: 70%;
    }

</style>

<div class="page-content">
    <div class="card">
        <div class="card-body ">
            <h4 class="card-title fs-4 text-center">information sur voiteur </h4>
            <hr>

            <form method="POST">
                @csrf

                <div class="row">


                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Immatriculation</label>
                        <input type="text" class="form-control" value="{{ $car->immatriculation }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Marque</label>
                        <input type="text" class="form-control" value="{{ $car->marque }}" readonly>
                    </div>
               

              
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Modèle</label>
                        <input type="text" class="form-control" value="{{ $car->modele }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">État</label>
                        <input type="text" class="form-control" value="{{ $car->etat }}" readonly>
                    </div>

                    <hr>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Kilométrage</label>
                        <input type="number" class="form-control" value="{{ $car->kilometrage }}" readonly>
                    </div>
           

             
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Type d'Assurance</label>
                        <input type="text" class="form-control" value="{{ $car->assurance_type }}" readonly>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Prochaine Date d'Assurance</label>
                        <input type="date" class="form-control" value="{{ $car->next_assurance_date }}" readonly>
                    </div>
           

             
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Date de Fabrication</label>
                        <input type="text" class="form-control" value="{{ $car->couleur }}" readonly>
                    </div>

                    <hr>
              
                
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Couleur</label>
                        <input type="text" class="form-control" value="{{ $car->couleur }}" readonly>
                    </div>
              

             
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Type de Carburant</label>
                        <input type="text" class="form-control" value="{{ $car->type_carburant }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Transmission</label>
                        <input type="text" class="form-control" value="{{ $car->transmission }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Puissance (CV)</label>
                        <input type="number" class="form-control" value="{{ $car->puissance }}" readonly>
                    </div>

              <hr>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Nombre de Portes</label>
                        <input type="number" class="form-control" value="{{ $car->nombre_portes }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Nombre de Places</label>
                        <input type="number" class="form-control" value="{{ $car->nombre_places }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Prix</label>
                        <input type="text" class="form-control" value="{{ $car->prix }}" readonly>
                    </div>

                
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Date d'Achat</label>
                        <input type="date" class="form-control" value="{{ $car->date_achat }}" readonly>
                    </div>

                    <hr>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Propriétaire</label>
                        <input type="text" class="form-control" value="{{ $car->proprietaire }}" readonly>
                    </div>
                
                    <hr>

              
                    <div class="col-sm-12 mb-3">
                        <label class="form-label">Description</label>
                        <hr>
                        <textarea class="form-control" rows="3" readonly>{{ $car->description }}</textarea>
                    </div>

<hr>
                </div>
            </div>
            </form>
        </div>
    </div>


@endsection
