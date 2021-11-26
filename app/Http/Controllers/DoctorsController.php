<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function create()
    {

        return view('doctors.create');
    }


    public function store(Request $request) {        
        //       //creating/saving users to db
        $request->validate([
            'name' => 'required',
            'tele_phone_no'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=> 'required|email|unique:doctors',
            'speciality'=> 'required',
            'room_no'=> 'required|numeric|max:25',
            'status'=> 'required',
        ]);
        Doctor::create($request->all());    
        return redirect()->route('doctors.index')
        ->with('succsess','Doctor created successfully');
    
        }
      



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
       $doctor = Doctor::where('id', $doctor->id)->first();
       return view('doctors.show', ['doctor' => $doctor]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $doctor = Doctor::find($doctor->id);
        return view('doctors.edit', ['doctor' => $doctor]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required',
            'tele_phone_no'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=> 'required|email',
            'speciality'=> 'required',
            'room_no'=> 'required|numeric|max:25',
            'status'=> 'required',
        ]);
            $doctorUpdate = Doctor::where('id',$doctor->id)
            ->update([
                'name'=>$request->input('name'),
                'tele_phone_no'=>$request->input('tele_phone_no'),
                'email'=>$request->input('email'),
                'speciality'=>$request->input('speciality'),
                'room_no'=>$request->input('room_no'),
                'status'=>$request->input('status'),


            ]);
            if($doctorUpdate){
                return redirect()->route('doctors.show',['doctor'=>$doctor->id])
                ->with('succsess','Doctor updated successfully');

            }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //$Doctor=  Doctor::find($doctor);
        //$Doctor->delete();
       // return ['message' => 'Doctors Deleted'];
       

       /// $Doctor->isDeleted = '1';
      ///  $Doctor->save();
        $doctor->delete();

        return redirect()->route('doctors.index')
            ->with('success','Doctor deleted successfully');

    }
}
