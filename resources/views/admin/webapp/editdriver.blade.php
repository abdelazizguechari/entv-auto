@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Driver</h6>
                    <form action="{{ route('drivers.update', ['id' => $driver->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $driver->nom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $driver->prenom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="permis_conduire">Permis Conduire</label>
                            <input type="text" class="form-control" id="permis_conduire" name="permis_conduire" value="{{ $driver->permis_conduire }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $driver->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $driver->telephone }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Driver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection