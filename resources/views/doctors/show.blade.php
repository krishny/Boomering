@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Doctor</h3>
  </div>
  <div class="card-body">
  
    <h5 class="card-title"></h5><table class="table table-dark">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  
        <h1>Showing {{ $doctor->name }}</h1>
       
	<div class="jumbotron text-center">
		<h2>{{ $doctor->name }}</h2>
		<p>
			<strong>Phone No:</strong> {{ $doctor->tele_phone_no }}<br>
      <strong>Email:</strong> {{ $doctor->email }}<br>
      <strong>Speciality:</strong> {{ $doctor->speciality }}<br>
      <strong>Room No:</strong> {{ $doctor->room_no }}<br>
      <strong>Status:</strong> {{ $doctor->status }}
		</p>
    <a class="btn btn-warning" href="/doctors/{{$doctor->id}}/edit">Edit</a>
    <a class="btn btn-info" href="/doctors">Back</a>
	</div>
       


  </div>
</div>
@endsection