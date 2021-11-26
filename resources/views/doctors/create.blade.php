@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Doctors</h3>
    <div class="card-body">

    <form method="post" action ="{{route('doctors.store')}}">
        {{csrf_field()}}
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="form-group"> 
            <lable for="doctor-name"> Name <span class="required">*</span></lable>
            <input placeholder="Enter name"
                    id = "doctor-name"
                    requided
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>
          <div class="form-group"> 
            <lable for="doctor-tele_phone_no"> Phone Number <span class="required">*</span></lable>
            <input placeholder="Phone no"
                    id = "doctor-tele_phone_no"
                    requided
                    name="tele_phone_no"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>
          <div class="form-group"> 
            <lable for="doctor-email"> Email <span class="required">*</span></lable>
            <input placeholder="Enter Email"
                    id = "doctor-email"
                    requided
                    name="email"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>

          <div class="form-group"> 
            <lable for="doctor-speciality"> Speciality<span class="required">*</span></lable>
            <input placeholder="Speciality"
                    id = "doctor-speciality"
                    requided
                    name="speciality"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>

          <div class="form-group"> 
            <lable for="doctor-room_no"> Room Number <span class="required">*</span></lable>
            <input placeholder="Room number"
                    id = "doctor-room_no"
                    requided
                    name="room_no"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>
          <div class="form-group"> 
            <lable for="doctor-status"> Status <span class="required"> * </span></lable>
            <select id="doctor-status" name="status" class="form-control">
            <option selected>Active</option>
             <option>Inactive</option>
            </select>
            </div>
            
          <div class="form-group">

            <input type="submit" class="btn btn-primary" value="Submit"/>
            <a class="btn btn-info" href="/doctors">Back</a>
          </div>




  
  
</form>
  </div>
</div>
@endsection