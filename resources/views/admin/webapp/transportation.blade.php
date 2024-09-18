@extends('admin.dash')

@section('admin')
<div class="page-content">
    <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0">
        <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle>
            <i data-feather="calendar" class="text-primary"></i>
        </span>
        <input type="date" class="form-control bg-transparent border-primary" name="date" placeholder="Sélectionner une date" data-input id="datePicker">
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-4">Transport</h6>
                    <hr>
                    <table class="table" id="dataTableExampl" style="display: none;"> <!-- Hide the table initially -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Début de la Mission</th>
                                <th>Fin de la Mission</th>
                                <th>Statut</th>
                                <th>nb Carburant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table rows will be dynamically updated -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://unpkg.com/feather-icons"></script>

<script>
$(document).ready(function() {
    // Initialize Feather Icons
    feather.replace();

    // Initialize Flatpickr with minDate set to today
    flatpickr("#datePicker", {
        minDate: "today"
    });

    // Define route URL templates with placeholders
    const editUrlTemplate = '{{ route("transportation.edit", ["id" => "ider"]) }}';
    const deleteUrlTemplate = '{{ route("missions.destroy", ["id" => "ider"]) }}';

    // Handle date input change
    $('input[name="date"]').on('change', function() {
        var selectedDate = $(this).val(); // Get the selected date
        if (selectedDate) {
            fetchMissionsByDate(selectedDate);
        } else {
            $('#dataTableExampl').hide(); // Hide the table if no date is selected
        }
    });

    // Fetch missions by date
    function fetchMissionsByDate(dateStr) {
        $.ajax({
            url: '{{ route("test.date") }}', // Use the test route for fetching missions
            method: 'GET',
            data: { date: dateStr }, // Pass the selected date
            beforeSend: function() {
                $('body').append('<div class="loading">Loading...</div>');
            },
            success: function(response) {
                console.log('Server response:', response); // Debugging output
                updateTable(response.missions); // Call function to update the table
            },
            error: function(xhr) {
                console.error("Error occurred:", xhr);
                toastr.error('Une erreur est survenue lors de la récupération des missions.');
            },
            complete: function() {
                $('.loading').remove();
            }
        });
    }

    // Update table with mission data
    function updateTable(missions) {
        var tableBody = $('#dataTableExampl tbody');
        tableBody.empty(); // Clear previous data

        // Sort missions by start time
        missions.sort(function(a, b) {
            return new Date(a.mission_start) - new Date(b.mission_start);
        });

        if (missions.length > 0) {
            $('#dataTableExampl').show(); // Show the table if there are missions

            missions.forEach(function(mission, index) {
                // Create edit and delete URLs
                var editUrl = editUrlTemplate.replace('ider', mission.id);
                var deleteUrl = deleteUrlTemplate.replace('ider', mission.id);

                // Add a new row to the table
                var row = `<tr>
                    <td>${index + 1}</td>
                    <td>${mission.name}</td>
                    <td>${new Date(mission.mission_start).toLocaleString()}</td> <!-- Format date as needed -->
                    <td>${new Date(mission.mission_end).toLocaleString()}</td> <!-- Format date as needed -->
                    <td>${mission.status}</td>
                    <td>${mission.fuel_tokens}</td>
                    <td>
                        <a href="${editUrl}" class="btn btn-inverse-info btn-icon"><i data-feather="edit"></i></a>
                        <form action="${deleteUrl}" method="POST" style="display:inline-block;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-inverse-danger btn-icon"><i data-feather="trash"></i></button>
                        </form>
                    </td>
                </tr>`;
                tableBody.append(row);
            });
        } else {
            $('#dataTableExampl').show(); // Show the table even if no missions are found
            tableBody.append('<tr><td colspan="7" class="text-center">Aucune mission trouvée</td></tr>');
        }

        // Reinitialize Feather Icons for new content
        feather.replace();
    }
});
</script>
