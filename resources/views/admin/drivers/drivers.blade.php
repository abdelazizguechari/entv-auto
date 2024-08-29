@extends('admin.dash')

@section('admin')
    <h1>Drivers List</h1>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Licence Number</th>
                <th>Licence expiry</th>
                <th>Status</th>
                <th>Assigned Car</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->first_name }}</td>
                    <td>{{ $driver->last_name}}</td>
                    <td>{{ $driver->email }}</td>
                    <td>{{ $driver->phone }}</td>
                    <td>{{ $driver->license_number }}</td>
                    <td>{{ $driver->license_expiry }}</td>
                    <td>{{ $driver->status }}</td>
                    <td>
                        @if($driver->car)
                            {{ $driver->car->marque }} - {{ $driver->car->immatriculation }}
                        @else
                            No car assigned
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
