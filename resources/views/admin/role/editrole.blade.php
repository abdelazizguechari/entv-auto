@extends('admin.dash')

@section('admin')

<div class="page-content  bg-dark">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Modifier le rôle</h6>

                    {{-- Display success or error messages --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('update.role') }}" method="post" class="forms-sample">
                        @csrf

                        <input type="hidden" name="id" value="{{ $edit->id }}">

                        <div class="mb-3">
                            <label for="roleName" class="form-label">Nom du rôle</label>
                            <input name="name" type="text" value="{{ old('name', $edit->name) }}" class="form-control" id="roleName" autocomplete="off" required>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Soumettre</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Annuler</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
