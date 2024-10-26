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
            <h4 class="card-title fs-4 text-center">information sur driver </h4>
            <hr>

            <form method="POST">
                @csrf

                <div class="row ">


                    <div class="col-sm-3 mb-3">
                        <label class="form-label">nom</label>
                        <input type="text" class="form-control" value="{{ $data->nom }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">prenom</label>
                        <input type="text" class="form-control" value="{{ $data->prenom }}" readonly>
                    </div>
               

              
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">assurance num</label>
                        <input type="text" class="form-control" value="{{ $data->assurance_num }}" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">permis conduire</label>
                        <input type="text" class="form-control" value="{{ $data->permis_conduire  }}" readonly>
                    </div>

                    <hr class="mb-3 mt-3">

                    <div class="col-sm-3 mb-3">
                        <label class="form-label">telephone</label>
                        <input type="number" class="form-control" value="{{ $data->telephone }}" readonly>
                    </div>
           

             
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">num cas urgance</label>
                        <input type="text" class="form-control" value="{{ $data->num_cas_urgance}}" readonly>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">nom cas urgance </label>
                        <input type="text" class="form-control" value="{{ $data->nom_cas_urgance }}" readonly>
                    </div>
           

             
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">email</label>
                        <input type="text" class="form-control" value="{{ $data->email }}" readonly>
                    </div>

                    <hr class="mb-3 mt-3">
              
                
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">adresse</label>
                        <input type="text" class="form-control" value="{{ $data->adresse }}" readonly>
                    </div>
              

             
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">date naissance</label>
                        <input type="text" class="form-control" value="{{ $data->date_naissance }}" readonly>
                    </div>


                </div>
            </div>
            </form>
        </div>
    </div>


@endsection
