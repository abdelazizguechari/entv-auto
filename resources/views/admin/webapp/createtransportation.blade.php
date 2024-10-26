@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-4">Créer une Mission de Transport</h6>
                    <hr>
                    <form id="transportationForm" action="{{ route('missions.store.transportation') }}" method="POST">
                        @csrf

                        <!-- Toastr notifications will be displayed here -->
                        <div id="form-messages"></div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mission_start">Début de la Mission</label>
                                    <input type="datetime-local" class="form-control @error('mission_start') is-invalid @enderror" id="mission_start" name="mission_start" value="{{ old('mission_start') }}">
                                    @error('mission_start')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mission_end">Fin de la Mission</label>
                                    <input type="datetime-local" class="form-control @error('mission_end') is-invalid @enderror" id="mission_end" name="mission_end" value="{{ old('mission_end') }}">
                                    @error('mission_end')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Statut</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>En cours</option>
                                        <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Planifiée</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Terminée</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fuel_tokens">Jetons de Carburant</label>
                                    <input type="number" min="0" class="form-control @error('fuel_tokens') is-invalid @enderror" id="fuel_tokens" name="fuel_tokens" value="{{ old('fuel_tokens') }}">
                                    @error('fuel_tokens')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="distance">Distance</label>
                                    <input type="number" min="0" class="form-control @error('distance') is-invalid @enderror" id="distance" name="distance" value="{{ old('distance') }}">
                                    @error('distance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="car_id">Voiture</label>
                            <select class="form-control @error('car_id') is-invalid @enderror" id="car_id" name="car_id" required>
                                <option value="">Sélectionnez une voiture</option>
                                @if(!empty($cars) && $cars->count())
                                    @foreach($cars as $car)
                                        <option value="{{ $car->immatriculation }}" {{ old('car_id') == $car->immatriculation ? 'selected' : '' }}>{{ $car->immatriculation }}</option>
                                    @endforeach
                                @else
                                    <option value="">Aucune voiture disponible</option>
                                @endif
                            </select>
                            @error('car_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Créer la Mission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Ensure proper script version -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#transportationForm').on('submit', function(e) {
            e.preventDefault();
    
            // Clear previous errors
            $('.invalid-feedback').text('');
            $('.form-control').removeClass('is-invalid');
    
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    console.log("Response received:", response);
                    if (response.success) {
                        toastr.success(response.message);
                        $('#transportationForm')[0].reset(); // Optionally reset the form
                    }
                },
                error: function(xhr) {
                    console.log("Error occurred:", xhr);
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            var fieldElement = $('#' + field);
                            fieldElement.addClass('is-invalid');
                            fieldElement.siblings('.invalid-feedback').text(messages.join(', '));
                        });
                    } else {
                        toastr.error('Une erreur est survenue.');
                    }
                }
            });
        });
    });
    </script>
    
