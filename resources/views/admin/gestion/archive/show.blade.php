@extends('admin.dash')

@section('admin') 


<div class="page-content">


<div class="container">
    <h4>Mission Archive Details</h4>

    <hr>

    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-md-4">
                <p><strong>Type:</strong> {{ $archive->type }}</p>
                </div>

                <div class="col-md-4">
                <p><strong>Name:</strong> {{ $archive->name }}</p>
            </div>

          
                <div class="col-md-4">
                <p><strong>Mission Start:</strong> {{ $archive->mission_start }}</p>
            </div>

</div>

<hr>


<div class="row">
          
     
        <div class="col-md-4">
            <p><strong>Mission End:</strong> {{ $archive->mission_end }}</p>
        </div>

            <div class="col-md-4">
            <p><strong>Crew Leader:</strong> {{ $archive->crew_leader }}</p>
        </div>

            <div class="col-md-4">
            <p><strong>Crew Name:</strong> {{ $archive->crew_name }}</p>
        </div>

        </div>
<hr>
        <div class="row">

            <div class="col-md-4">
            <p><strong>Status:</strong> {{ $archive->status }}</p>
        </div>

            <div class="col-md-4">
            <p><strong>Fuel Tokens:</strong> {{ $archive->fuel_tokens }}</p>
        </div>

            <div class="col-md-4">
            <p><strong>Fuel Tokens Used:</strong> {{ $archive->fuel_tokens_used }}</p>
        </div>

        </div>
<hr>
        <div class="row">

            <div class="col-md-4">
            <p><strong>Distance:</strong> {{ $archive->distance }}</p>
        </div>

            <div class="col-md-4">
            <p><strong>Car ID:</strong> {{ $archive->car_id }}</p>
        </div>

            <div class="col-md-4">
            <p><strong>Driver ID:</strong> {{ $archive->driver_id }}</p>
        </div>

        </div>

        <hr>

            <p><strong>Description:</strong> {{ $archive->description }}</p>
            <!-- Add more details as needed -->

            <!-- Add a back button to return to the list -->

        </div>
    </div>
</div>
</div>

@endsection