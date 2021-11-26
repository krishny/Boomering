@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Appointments</h3>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5><table class="table table-dark">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-step">
    <a class="btn btn-success" href="/appointments/create">New Appointment</a>
    <a class="btn btn-primary" href="/doctors">Doctors</a>
    <a class="btn btn-primary" href="/patients">Patient</a>
    </div>
</br>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Appointment Day</th>
      <th scope="col">Room No</th>
      <th scope="col">Note</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($appointments as $appointment)
        <tr> 
            <td>{{ $appointment->id }}</td>    
            
            
            <td>{{app\Models\Doctor::find($appointment->doctor_id)->name}}</td>
           
            <td>{{app\Models\Patient::find($appointment->patient_id)->name}}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->appointment_time }}</td>
            <td>{{ $appointment->appointment_day }}</td>
            <td>{{ $appointment->room_no }}</td>
            <td>{{ $appointment->note }}</td>
            <td>{{ $appointment->status }}</td>
            <td>
            
                  <form action="{{ route('appointments.destroy',$appointment->id) }}" method="POST">
                      
                   <a class="btn btn-info" href="/appointments/{{$appointment->id}}">View</a>
                   <a class="btn btn-warning" href="/appointments/{{$appointment->id}}/edit">Edit</a>
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                
            </td>
        </tr>
        @endforeach
  </tbody>
</table>
  </div>
</div>
@endsection