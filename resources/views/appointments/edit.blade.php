@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Appointments</h3>
    <div class="card-body">

    <form method="post" action ="{{ route('appointments.update', [$appointment->id]) }}">
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
        <input type="hidden" name="_method" value="put">

    
          <div class="form-group"> 
            <lable for="appointment-doctor_id"> Doctor Name <span class="required"> * </span></lable>
            <select id="appointment-doctor_id" name="doctor_id" class="form-control">
            
            <option value="{{ $getdoctors->id }}" selected >{{$getdoctors->name}}</option>
        
              @foreach ($alldoctors as $alldoctor)
               <option value="{{ $alldoctor->id }}">{{ $alldoctor->name }}</option>
              @endforeach 
            </select>
          </div>


          <div class="form-group"> 
            <lable for="appointment-patient_id"> Patient Name <span class="required"> * </span></lable>
            <select id="appointment-patient_id" name="patient_id" class="form-control">
        
            <option value="{{ $getpatients->id }}" selected>{{ $getpatients->name }}</option>
           
              @foreach ($allpatients as $allpatient)
               <option value="{{ $allpatient->id }}">{{ $allpatient->name }}</option>
              @endforeach 
            </select>
          </div>

      

         <div class="form-group"> 
            <lable for="appointment-appointment_date"> Appointment Date <span class="required">*</span></lable>
            <input placeholder="Appointment Date"
                    id = "appointment-appointment_date"
                    requided
                    name="appointment_date"
                    spellcheck="false"
                    class="form-control"
                    value ="{{$appointment->appointment_date}}"

                    >
          </div>

          <div class="form-group"> 
            <lable for="appointment-appointment_time"> Appointment Time <span class="required">*</span></lable>
            <input placeholder="Appointment Time"
                    id = "appointment-appointment_time"
                    requided
                    name="appointment_time"
                    spellcheck="false"
                    class="form-control"
                    value ="{{$appointment->appointment_time}}"
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
                    value ="{{$appointment->appointment_day}}"
                    >
          </div>
          <div class="form-group"> 
            <lable for="appointment-room_no"> Room Number <span class="required">*</span></lable>
            <input placeholder="Room number"
                    id = "appointment-room_no"
                    requided
                    readonly
                    name="room_no"
                    spellcheck="false"
                    class="form-control"
                    value ="{{$appointment->room_no}}"
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
                    value ="{{$appointment->note}}"
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
            <a class="btn btn-info" href="/appointments">Back</a>
          </div>




  
  
</form>
  </div>
</div>
<script type="text/javascript">
$('#appointment-doctor_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#appointment-room_no').val(response.room_no);
            }
           
        }
    });
});
</script>
@endsection