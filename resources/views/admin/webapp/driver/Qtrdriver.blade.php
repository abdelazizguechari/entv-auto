@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="col-md-12 stretch-card">
        <div class="card ">

            <div class="card-body ">
                <h4 class="card-title fs-4">Signaler un Conducteur</h4>
                <hr>
                <form method="POST" action="{{ route('report.driver') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Le nom du régisseur</label>
                                <input style="border: none;background-color:transparent;" type="text" class="form-control" value="{{$user->firstname}} {{$user->lastname}}" readonly required>
                                <input type="hidden" class="form-control" name="singler_par" value="{{ $user->id }}" readonly required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Nom et prénom du conducteur</label>
                                <input style="border: none;background-color:transparent;" type="text" class="form-control" value="{{ $data->nom }} {{ $data->prenom }}" readonly required>
                                <input type="hidden" class="form-control" name="driver_id" value="{{ $data->id }}" readonly required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Le matricule du conducteur</label>
                                <input style="border: none;background-color:transparent;" type="text" class="form-control" value="{{ $data->matricule }}" readonly required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Immatriculation de voiture</label>
                                <input style="border: none;background-color:transparent;" type="text" class="form-control" value="{{ $voitureImmatriculation }}" readonly required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="type_conger">Raison de signalement</label>
                                <select name="raison" id="type_conger" class="form-control" required>
                                    <option value="" disabled selected>Sélectionnez une raison</option>
                                    <option value="accident_non_declare">Accident non déclaré</option>
                                    <option value="absence_travail_non_declare">Absence de travail non déclarée</option>
                                    <option value="probleme_entreprise">Problèmes avec l'entreprise</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date de Début -->
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Date de signalement</label>
                                <input type="date" class="form-control" name="date_singler" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="justification"></textarea>
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
