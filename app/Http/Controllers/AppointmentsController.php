<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldoctors =  Doctor::all();
        $allpatients = Patient::all();
        $appointments = Appointment::all();
        return view('appointments.index', ['appointments' => $appointments],
        compact('alldoctors','allpatients',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.create',compact('doctors','patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id'=> 'required|numeric|max:50',
            'patient_id'=> 'required|numeric|max:50',
            'appointment_date' =>  'required|date|date_format:Y-m-d',
            'appointment_time' => 'required|date_format:H:i',
            'appointment_day' => 'required',
            'room_no'=> 'required|numeric|max:25',
            'note'=> 'required',
            'status'=> 'required',
        ]);
        Appointment::create($request->all());    
        return redirect()->route('appointments.index')
        ->with('succsess','Appointment created successfully');
    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {

        $alldoctors =  Doctor::all();
        $allpatients = Patient::all();
        $getdoctors = Doctor::where('id',$appointment->doctor_id)->first();
        $getpatients = Patient::where('id',$appointment->patient_id)->first();
        $appointment = Appointment::where('id', $appointment->id)->first();
        return view('appointments.show', ['appointment' => $appointment],
        compact('alldoctors','getdoctors','allpatients','getpatients'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        
       // $findappointments = Appointment::where('id',$appointment);
              
        $appointment = Appointment::find($appointment->id);
        $alldoctors =  Doctor::all();
        $allpatients = Patient::all();
        $getdoctors = Doctor::where('id',$appointment->doctor_id)->first();
        $getpatients = Patient::where('id',$appointment->patient_id)->first();


        return view('appointments.edit', ['appointment' => $appointment],
        compact('alldoctors','getdoctors','allpatients','getpatients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'doctor_id'=> 'required|numeric|max:50',
            'patient_id'=> 'required|numeric|max:50',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'appointment_day' => 'required',
            'room_no'=> 'required|numeric|max:25',
            'note'=> 'required',
            'status'=> 'required',

        ]);
            $appointmentUpdate = Appointment::where('id',$appointment->id)
            ->update([
                'doctor_id'=>$request->input('doctor_id'),
                'patient_id'=>$request->input('patient_id'),
                'appointment_date'=>$request->input('appointment_date'),
                'appointment_time'=>$request->input('appointment_time'),
                'appointment_day'=>$request->input('appointment_day'),
                'room_no'=>$request->input('room_no'),
                'note'=>$request->input('note'),
                'status'=>$request->input('status'),


            ]);
            if($appointmentUpdate){
                return redirect()->route('appointments.show',['appointment'=>$appointment->id])
                ->with('succsess','Appointment updated successfully');

            }
        return back()->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')
            ->with('success','Appointment deleted successfully');
    }
}
