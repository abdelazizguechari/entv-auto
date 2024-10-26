@extends('admin.dash')

@section('admin')
<style>

.form-control {background-color: transparent}

</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body ">
                    <h6 class="card-title fs-4">Edit Event</h6>
                    <hr>
                    <form action="{{ route('events.update', ['id' => $event->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-3 ">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="event_start">Event Start</label>
                                    <input type="datetime-local" class="form-control" id="event_start" name="event_start" value="{{ $event->start_date }}">
                                </div>
                            </div>
                            <div class="col md-4">
                                <div class="form-group">
                                    <label class="form-label" for="event_end">Event End</label>
                                    <input type="datetime-local" class="form-control" id="event_end" name="event_end" value="{{ $event->end_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection