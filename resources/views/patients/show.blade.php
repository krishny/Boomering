@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Patient</h3>
  </div>
  <div class="card-body">  
    <h5 class="card-title"></h5><table class="table table-dark">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  
        <h1>Showing {{ $patient->name }}</h1>
       
	<div class="jumbotron text-center">
		<h2>{{ $patient->name }}</h2>
		<p>
	  <strong>Phone No:</strong> {{ $patient->tele_phone_no }}<br>
      <strong>Email:</strong> {{ $patient->email }}<br>
      <strong>Date Of Birth:</strong> {{ $patient->date_of_birth }}<br>
      <strong>Status:</strong> {{ $patient->status }}
		</p>
    <a class="btn btn-warning" href="/patients/{{$patient->id}}/edit">Edit</a>
    <a class="btn btn-info" href="/patients">Back</a>
	</div>
       


  </div>
</div>
@endsection