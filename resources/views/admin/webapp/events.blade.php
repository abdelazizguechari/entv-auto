@extends('admin.dash')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fs-4">Events</h6>
                    <hr>
                    <table class="table missionsTable"   id="dataTableExample">
                        <thead>
                            <tr>
        
                                <th>Name</th>
                                <th>Event Start</th>
                                <th>Event End</th>
                                <th>Description</th>
                                <th>action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->event_start }}</td>
                                    <td>{{ $event->event_end }}</td>
                                    <th> {{$event->description}}</th>
                                    <td>
                                        <a href="{{ route('events.Delete', $event->id)}}" class="btn btn-danger btn-icon"><i data-feather="trash"> </i></a> 
                                         <a href="{{ route('events.edit',$event->id) }}" class="btn btn-info btn-icon"><i data-feather="edit"> </i></a> 
                                         
                                         <a href="{{ route('events.details',$event->id)}}" class="btn btn-success btn-icon"><i data-feather="eye"> </i></a> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection