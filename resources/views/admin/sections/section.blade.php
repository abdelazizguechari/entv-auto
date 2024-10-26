@extends('admin.dash')

@section('admin')

<div class="page-content bg-dark">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body ">
                    <h6 class="card-title fs-4">Mise à jour des informations de la section</h6>
                    <hr>

                    <!-- Update form for department -->
                    <form action="{{ route('departments.update', $data->id) }}" method="post" class="forms-sample">
                        @csrf
                        @method('PUT') <!-- Important for updating records -->
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom de section</label>
                                <input type="text" class="form-control" name="nom" value="{{ $data->nom }}" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nombre d'employés</label>
                                <input type="number" class="form-control" name="nb_employes" value="{{ $data->nb_employes }}" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Responsable</label>
                                <input type="text" class="form-control" name="responsable" value="{{ $data->responsable }}" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Localisation</label>
                                <input type="text" class="form-control" name="localisation" value="{{ $data->localisation }}" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $data->email }}" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Téléphone</label>
                                <input type="text" class="form-control" name="telephone" value="{{ $data->telephone }}" required />
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
