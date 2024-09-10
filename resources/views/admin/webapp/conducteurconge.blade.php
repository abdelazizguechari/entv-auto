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
                <h4 class="card-title fs-4">Formulaire de Congé</h4>
                <hr>
                <form method="POST" action="{{route('add.conger',$driverdata->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                     
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Nom du Conducteur</label>
                                <input type="text" class="form-control" value="{{ $driverdata->nom }}" readonly required>
                                <input type="hidden" class="form-control" name="driver_id" value="{{ $driverdata->id }}" readonly required>
                            </div>
                        </div>

                      
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Prénom du Conducteur</label>
                                <input type="text" class="form-control" value="{{ $driverdata->prenom }}" readonly required>
                            </div>
                        </div>
                    </div>

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

                    <!-- Motif (optional for both types of leave) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Motif</label>
                                <textarea class="form-control" name="motif" rows="3" placeholder="Entrez le motif du congé (optionnel)"></textarea>
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


<script>



document.addEventListener('DOMContentLoaded', function() {
    const startDateInput = document.querySelector('input[name="start_date"]');
    const endDateInput = document.querySelector('input[name="end_date"]');

    endDateInput.addEventListener('change', function() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (endDate < startDate) {
            alert("La date de fin ne peut pas être avant la date de début.");
            endDateInput.value = ''; 
        }
    });

   
    document.getElementById('type_conger').addEventListener('change', function() {
        const typeConger = this.value;
        const certificateField = document.getElementById('certificat_maladie_field');

        if (typeConger === 'conger_maladie') {
            certificateField.style.display = 'block';
        } else {
            certificateField.style.display = 'none';
        }
    });
});

</script>
