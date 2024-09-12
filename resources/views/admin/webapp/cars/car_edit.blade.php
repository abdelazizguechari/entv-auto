@extends('admin.dash')

@section('admin') 

@php 
    $types->etat;
@endphp

<div class="page-content bg-dark">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Mise à jour de la voiture</h6>
                   
                    <form action="{{ route('update.car', $types->immatriculation) }}" method="post" class="forms-sample">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">État</label>
                                <input type="text" class="form-control" name="etat" value="{{ $types->etat }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kilométrage</label>
                                <input type="text" class="form-control" name="kilometrage" value="{{ $types->kilometrage }}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Assurance Type</label>
                                <input type="text" class="form-control" name="assurance_type" value="{{ $types->assurance_type }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date de l'assurance suivante</label>
                                <input type="date" class="form-control" name="next_assurance_date" value="{{ $types->next_assurance_date }}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Type de Carburant</label>
                                <input type="text" class="form-control" name="type_carburant" value="{{ $types->type_carburant }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Couleur</label>
                                <input type="color" class="form-control" name="couleur" value="{{ $types->couleur }}" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3">{{ $types->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary text-uppercase">Mettre à jour</button>
                        
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
