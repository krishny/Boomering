@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Appointment Details</h3>
  </div>
  <div class="card-body">
  
    <h5 class="card-title"></h5><table class="table table-dark">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

       
	<div class="jumbotron text-center">
		<p>
      
	  <strong>Doctor name:</strong> {{ $getdoctors->name }}<br>
	  <strong>Patient name:</strong> {{ $getpatients->name }}<br>
      <strong>Appointment Date:</strong> {{ $appointment->appointment_date }}<br>
      <strong>Appointment Time:</strong> {{ $appointment->appointment_time }}<br>
      <strong>Appointment Day:</strong> {{ $appointment->appointment_day }}<br>
      <strong>Room No:</strong> {{ $appointment->room_no }}<br>
      <strong>Note:</strong> {{ $appointment->note }}<br>
      <strong>Status:</strong> {{ $appointment->status }}
		</p>
    <a class="btn btn-warning" href="/appointments/{{$appointment->id}}/edit">Edit</a>
    <a class="btn btn-info" href="/appointments">Back</a>
	</div>
       

  </div>
</div>
@endsection