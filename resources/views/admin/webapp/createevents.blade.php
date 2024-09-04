@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Create Event Mission</h6>
                    <form id="eventForm" action="{{ route('missions.store.events') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_start">Event Start</label>
                            <input type="datetime-local" class="form-control" id="event_start" name="event_start">
                        </div>
                        <div class="form-group">
                            <label for="event_end">Event End</label>
                            <input type="datetime-local" class="form-control" id="event_end" name="event_end">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Event</button>
                        <button type="button" class="btn btn-secondary" onclick="submitFormAndAddMission()">Add Mission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitFormAndAddMission() {
        const form = document.getElementById('eventForm');
        const action = form.action;
        form.action = action + '?redirect_to_add_mission=true';
        form.submit();
    }
</script>

@endsection