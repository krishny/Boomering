@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Appointments</h3>
    <div class="card-body">

    <form method="post" action ="{{route('appointments.store')}}">
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
            <lable for="appointment-doctor_id"> Doctor name <span class="required"> * </span></lable>
            <select id="appointment-doctor_id" name="doctor_id" class="form-control">
            
              @foreach ($doctors as $doctor)
               <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
              @endforeach 
            </select>
          </div>

          
          <div class="form-group"> 
            <lable for="appointment-patient_id"> Patient name <span class="required"> * </span></lable>
            <select id="appointment-patient_id" name="patient_id" class="form-control">
            
              @foreach ($patients as $patient)
               <option value="{{ $patient->id }}">{{ $patient->name }}</option>
              @endforeach 
            </select>
          </div>
          
          <div class="form-group"> 
            <lable for="appointment-appointment_date"> Appointment Date <span class="required">*</span></lable>
            <input placeholder="YYYY-MM-DD"
                    id = "appointment-appointment_date"
                    requided
                    name="appointment_date"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>

          <div class="form-group"> 
            <lable for="appointment-appointment_time"> Appointment Time <span class="required">*</span></lable>
            <input placeholder="HH:MM"
                    id = "appointment-appointment_time"
                    requided
                    name="appointment_time"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>

          <div class="form-group"> 
            <lable for="appointment-appointment_day"> Appointment Day <span class="required">*</span></lable>
            <input placeholder="Appointment Day"
                    id = "appointment-appointment_day"
                    requided
                    name="appointment_day"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>

          <div class="form-group"> 
            <lable for="appointment-room_no"> Room Number <span class="required">*</span></lable>
            <input placeholder="Room number"
                    id = "appointment-room_no"
                    requided
                    name="room_no"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>

          <div class="form-group"> 
            <lable for="appointment-note"> Note<span class="required">*</span></lable>
            <input placeholder="Note"
                    id = "appointment-note"
                    requided
                    name="note"
                    spellcheck="false"
                    class="form-control"
                    
                    >
          </div>
  
          <div class="form-group"> 
            <lable for="appointment-status"> Status <span class="required"> * </span></lable>
            <select id="appointment-status" name="status" class="form-control">
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

