@extends('admin.dash')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('all.stock') }}">Stock</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editer Stock</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h6 class="card-title fs-4">Editer Stock</h6>
                    <hr>
                    <form action="{{ route('update.stock', $stock->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="category">Categorie</label>
                            <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $stock->category) }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantité</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $stock->quantity) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Prix unitaire</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $stock->price) }}" required>
                        </div>                   
                        <button type="submit" class="btn btn-primary">mis à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
