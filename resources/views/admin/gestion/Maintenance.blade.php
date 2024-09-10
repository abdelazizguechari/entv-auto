@extends('admin.dash')

@section('admin') 

<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card bg-transparent">
                <div class="card-body bg-dark">
                    <h6 class="card-title fs-4">Add Stock to Maintenance</h6>
                    <hr class="mb-4">

                    <!-- Form Start -->
                    <form action="{{ route('maintenance.addStock') }}" method="POST">
                        @csrf
                        <input type="hidden" name="maintenance_id" value="{{ $data->id }}">
                    
                     
                        <div class="form-group mb-3">
                 <div class="col-md-4 ">      
<div class="form-group mb-3">
    <label for="immatriculation">Car Immatriculation:</label>
    <input style="background-color: transparent" type="text" id="immatriculation" class="form-control" value="{{ $data->immatriculation }}" readonly>
</div>
</div>


                        </div>

                        <!-- Stock Items -->
                        <h6>Stock Items</h6>
                        <hr>
                        @foreach ($stock as $produit)
                        <div style="display: flex" class="row mb-3">

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" name="stocks[{{ $produit->id }}][id]" class="form-check-input stock-checkbox" id="stock{{ $produit->id }}" value="{{ $produit->id }}">
                                    <label for="stock{{ $produit->id }}" class="form-check-label">
                                        {{ $produit->category }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group d-flex form-inline">
                                    <label for="quantity{{ $produit->id }}" class="mr-3">Quantity:</label>&nbsp;&nbsp;&nbsp;
                                    <input style="background-color: transparent" type="number" name="stocks[{{ $produit->id }}][quantity]" id="quantity{{ $produit->id }}" class="form-control" min="0" max="{{ $produit->quantity }}" disabled>
                                </div> 
                            </div>

                        </div>
                        <hr>
                        @endforeach

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Add Stock to Maintenance</button>
                    </form>
                    <!-- Form End -->

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Enable/disable quantity input based on checkbox selection
    document.querySelectorAll('.stock-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let quantityInput = document.getElementById('quantity' + this.value);
            if (this.checked) {
                quantityInput.disabled = false;
                quantityInput.required = true;  // Make quantity input required when checkbox is selected
            } else {
                quantityInput.disabled = true;
                quantityInput.value = '';  // Clear the quantity input when checkbox is unchecked
                quantityInput.required = false;
            }
        });
    });
</script>

@endsection
