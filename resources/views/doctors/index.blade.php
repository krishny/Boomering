@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Doctors</h3>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5><table class="table table-dark">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-step">
    <a class="btn btn-success" href="/doctors/create">New Doctor</a>
    <a class="btn btn-primary" href="/appointments">Appoinments</a>
    </div>
</br>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Email</th>
      <th scope="col">Speciality</th>
      <th scope="col">Room No</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($doctors as $doctor)
        <tr>
            <td>{{ $doctor->id }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->tele_phone_no }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->speciality }}</td>
            <td>{{ $doctor->room_no }}</td>
            <td>{{ $doctor->status }}</td>
            <td>
            
            
            
        
                  <form action="{{ route('doctors.destroy',$doctor->id) }}" method="POST">
                      
                   <a class="btn btn-info" href="/doctors/{{$doctor->id}}">View</a>
                   <a class="btn btn-warning" href="/doctors/{{$doctor->id}}/edit">Edit</a>
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