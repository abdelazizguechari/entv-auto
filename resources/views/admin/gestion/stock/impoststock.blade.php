
@extends('admin.dash')

@section('admin') 


<div class="page-content">
        
    <div class="container">
        <h2>Importer depuis Excel</h2>
        <hr>
        <form action="{{ route('import.stock') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choisir un fichier CSV:</label>
                <hr>
                <input type="file" name="file" id="file" accept=".csv" class="form-control">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Importer</button>
        </form>
    </div>

    </div>






@endsection