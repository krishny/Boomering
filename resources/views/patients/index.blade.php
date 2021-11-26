@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Patients</h3>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5><table class="table table-dark">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-step">
    <a class="btn btn-success" href="/patients/create">New Patient</a>
    
    <a class="btn btn-primary" href="/appointments">Appoinments</a>
    </div>
</br>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Email</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->tele_phone_no }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->date_of_birth }}</td>
            <td>{{ $patient->status }}</td>
            <td>
            
            
            
        
                  <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">
                      
                   <a class="btn btn-info" href="/patients/{{$patient->id}}">View</a>
                   <a class="btn btn-warning" href="/patients/{{$patient->id}}/edit">Edit</a>
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