@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3>Patients</h3>
    <div class="card-body">

    <form method="post" action ="{{ route('patients.update', [$patient->id]) }}">
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
            <lable for="patient-name"> Name <span class="required">*</span></lable>
            <input placeholder="Enter name"
                    id = "patient-name"
                    requided
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    value ="{{$patient->name}}"
                    
                    >
          </div>
          <div class="form-group"> 
            <lable for="patient-tele_phone_no"> Phone Number <span class="required">*</span></lable>
            <input placeholder="Phone no"
                    id = "patient-tele_phone_no"
                    requided
                    name="tele_phone_no"
                    spellcheck="false"
                    class="form-control"
                    value ="{{$patient->tele_phone_no}}"
                    
                    >
          </div>
          <div class="form-group"> 
            <lable for="patient-email"> Email <span class="required">*</span></lable>
            <input placeholder="Enter Email"
                    id = "patient-email"
                    requided
                    name="email"
                    spellcheck="false"
                    class="form-control"
                    value ="{{$patient->email}}"
                    
                    >
          </div>

          <div class="form-group"> 
            <lable for="patient-date_of_birth"> Date Of Birth <span class="required">*</span></lable>
            <input placeholder="YYY-MM-DD"
                    id = "patient-date_of_birth"
                    requided
                    name="date_of_birth"
                    spellcheck="false"
                    class="form-control"
                    value ="{{$patient->date_of_birth}}"
                    
                    >
          </div>

        
          <div class="form-group"> 
            <lable for="patient-status"> Status <span class="required"> * </span></lable>
            <select id="patient-status" name="status" class="form-control">
            <option selected>Active</option>
             <option>Inactive</option>
            </select>
            </div>
            
          <div class="form-group">

            <input type="submit" class="btn btn-primary" value="Submit"/>
            <a class="btn btn-info" href="/patients">Back</a>
          </div>




  
  
</form>
  </div>
</div>
@endsection