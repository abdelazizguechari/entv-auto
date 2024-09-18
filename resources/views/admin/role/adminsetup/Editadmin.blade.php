@extends('admin.dash')

@section('admin') 

<style>
    .form-control {
        background-color: transparent !important;
    }
    
    </style>
    

<div class="page-content d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title fs-4">modifier inforamtion utilisateur</h6>
                <hr>
                <form action="{{route('Update.admin',$user->id)}}" method="post" class="forms-sample">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Nom</label>
                        <input name="firstname" type="text" value="{{$user->firstname}}" class="form-control" id="exampleInputUsername1" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Prénom</label>
                        <input name="lastname" type="text" value="{{$user->lastname}}" class="form-control" id="exampleInputUsername1" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Matricule</label>
                        <input name="mat" type="text" class="form-control" value="{{$user->mat}}"  id="exampleInputUsername1" autocomplete="off">
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control" value="{{$user->email}}" id="exampleInputUsername1" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Téléphone</label>
                        <input name="phone" type="text" class="form-control" value="{{$user->phone}}" id="exampleInputUsername1" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Role</label>
                        <select name="roles" class="form-select" id="exampleFormControlSelect1" required>
                            {{-- <option selected disabled>Sélectionnez un groupe</option> --}}
                            @foreach ($Role as $role)
                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                        
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Soumettre</button>
                    <button class="btn btn-secondary">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
