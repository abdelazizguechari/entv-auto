@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Event</h6>
                    <form action="{{ route('events.update', ['event' => $event->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_start">Event Start</label>
                            <input type="datetime-local" class="form-control" id="event_start" name="event_start" value="{{ $event->start_date }}">
                        </div>
                        <div class="form-group">
                            <label for="event_end">Event End</label>
                            <input type="datetime-local" class="form-control" id="event_end" name="event_end" value="{{ $event->end_date }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection