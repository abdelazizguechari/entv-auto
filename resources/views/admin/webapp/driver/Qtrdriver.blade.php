@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="col-md-12 stretch-card">
        <div class="card ">


            <div class="card-body ">
                <h4 class="card-title fs-4">singler un condecteur</h4>
                <hr>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                     
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Le nom de regesseur</label>
                                <input  style="border: none;background-color:transparent;" type="text" class="form-control" value="{{ $data->nom }}" readonly required>
                                <input type="hidden" class="form-control" name="driver_id" value="{{ $data->id }}" readonly required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">nom et prenom de condicteur</label>
                                <input style="border: none;background-color:transparent;" type="text" class="form-control" value="{{ $data->nom }} {{ $data->prenom }}" readonly required>
                                <input type="hidden" class="form-control" name="driver_id" value="{{ $data->id }}" readonly required>
                            </div>
                        </div>
                      
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Le matricule de condicteur</label>
                                <input  style="border: none;background-color:transparent;" type="text" class="form-control" value="{{ $data->prenom }}" readonly required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Le matricule de voiteur</label>
                                <input  style="border: none;background-color:transparent;" type="text" class="form-control" value="{{ $data->prenom }}" readonly required>
                            </div>
                        </div>

                    </div>
<hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="type_conger">Type de Congé</label>
                                <select name="type_conger" id="type_conger" class="form-control" required>
                                    <option value="conger_annuelle">Congé Annuelle</option>
                                    <option value="conger_maladie">Congé Maladie</option>
                                    
                                </select>
                            </div>
                        </div>

                        <!-- Date de Début -->
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Date de Début</label>
                                <input type="date" class="form-control" name="start_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Date de Fin</label>
                                <input type="date" class="form-control" name="end_date" required>
                            </div>
                        </div>

                        
                        <div class="col-sm-6" id="certificat_maladie_field" style="display: none;">
                            <div class="mb-3">
                                <label class="mb-2" for="certificat_maladie">Certificat de Maladie</label>
                                <input type="file" class="form-control" name="certificat_maladie">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Soumettre le Formulaire</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

