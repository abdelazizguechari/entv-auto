@extends('admin.dash')

@section('admin')

<style>

.form-control {background-color: transparent}


</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body bg-dark">
                    <h6 class="card-title fs-4">Event Details</h6>
                    <hr> 

                    <div class="row">

                       
                        <div class="col-md-4">
                            <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" readonly>
                    </div>
                </div>
                 
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="event_start">Event Start</label>
                        <input type="text" class="form-control" id="event_start" name="event_start" value="{{ $event->event_start }}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="event_end">Event End</label>
                        <input type="text" class="form-control" id="event_end" name="event_end" value="{{ $event->event_end }}" readonly>
                    </div>
                </div>
            
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" readonly>{{ $event->description }}</textarea>
                </div>

                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection