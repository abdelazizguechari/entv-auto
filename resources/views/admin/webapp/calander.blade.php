@extends('admin.dash')

@section('admin')

<link rel="stylesheet" href="{{ asset('backend/assets/vendors/fullcalendar/main.min.css') }}">

<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 d-none d-md-block">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Calendrier complet</h6>
                            <div id='external-events' class='external-events'>
                                <h6 class="mb-2 text-muted">Événements Déplaçables</h6>
                                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                                    <div class='fc-event-main'>Anniversaire</div>
                                </div>
                                <!-- Add more draggable events here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div id='fullcalendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Details Modal -->
    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle1" class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modalBody1" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <a id="eventUrl" class="btn btn-primary" href="#" target="_blank">Page de l'Événement</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Event Modal -->
    <div id="createEventModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle2" class="modal-title">Ajouter un événement</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modalBody2" class="modal-body">
                    <form id="createEventForm">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">Titre de l'événement</label>
                            <input type="text" class="form-control" id="eventTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="eventDescription"></textarea>
                        </div>
                        <input type="hidden" id="eventStart">
                        <input type="hidden" id="eventEnd">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button class="btn btn-primary" id="saveEventButton">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.2/main.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(function() {
        var calendarEl = document.getElementById('fullcalendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: "prev,today,next",
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            editable: true,
            droppable: true,
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: function(fetchInfo, successCallback, failureCallback) {
                $.ajax({
                    url: '{{ route('events.index') }}', // Your Laravel route for fetching events
                    method: 'GET',
                    success: function(data) {
                        successCallback(data);
                    },
                    error: function() {
                        failureCallback();
                    }
                });
            },
            dateClick: function(info) {
                $('#eventStart').val(info.dateStr);
                $('#eventEnd').val(info.dateStr);
                $('#createEventModal').modal('show');
            },
            eventClick: function(info) {
                var eventObj = info.event;
                $('#modalTitle1').text(eventObj.title);
                $('#modalBody1').text(eventObj.extendedProps.description || 'No description');
                $('#eventUrl').attr('href', eventObj.url || '#');
                $('#fullCalModal').modal('show');
            },
        });

        calendar.render();

        $('#saveEventButton').on('click', function() {
            var title = $('#eventTitle').val();
            var description = $('#eventDescription').val();
            var start = $('#eventStart').val();
            var end = $('#eventEnd').val();

            $.ajax({
                url: '{{ route('events.store') }}', // Your Laravel route for saving events
                method: 'POST',
                data: {
                    title: title,
                    description: description,
                    start: start,
                    end: end,
                    _token: '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function(response) {
                    calendar.refetchEvents();
                    $('#createEventModal').modal('hide');
                },
                error: function() {
                    alert('Failed to save event');
                }
            });
        });
    });
</script>

@endsection
