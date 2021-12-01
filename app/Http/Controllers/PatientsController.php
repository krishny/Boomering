<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
            'name' => 'required',
            'tele_phone_no'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=> 'required|email|unique:patients',
            'date_of_birth'=> 'required|date|date_format:Y-m-d',
         //   'doctor_id'=> 'required',
            'status'=> 'required',
        ]);
        Patient::create($request->all());    
        return redirect()->route('patients.index')
        ->with('succsess','Patient created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $patient = Patient::where('id', $patient->id)->first();
        return view('patients.show', ['patient' => $patient]);
    }

    public function docpatient( $docpatient)

    {
        $doctorx = Doctor::where('id',$docpatient)->first();
        $appointmentx = Appointment::where('doctor_id', $docpatient)->first();
        $patientx = $appointmentx->patient_id;
        $patients = Patient::where('id', $patientx)->get();
        return view('patients.docpatient', compact('patients'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $patient = Patient::find($patient->id);
        return view('patients.edit', ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([

            'name' => 'required',
            'tele_phone_no'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=> 'required|email',
            'date_of_birth'=> 'required|date|date_format:Y-m-d',
          //  'doctor_id'=> 'required',
            'status'=> 'required',

        ]);
            $patientUpdate = Patient::where('id',$patient->id)
            ->update([
                'name'=>$request->input('name'),
                'tele_phone_no'=>$request->input('tele_phone_no'),
                'email'=>$request->input('email'),
                'date_of_birth'=>$request->input('date_of_birth'),
              //  'doctor_id'=>$request->input('doctor_id'),
                'status'=>$request->input('status'),


            ]);
            if($patientUpdate){
                return redirect()->route('patients.show',['patient'=>$patient->id])
                ->with('succsess','Patient updated successfully');

            }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success','Patient deleted successfully');
    }
}
