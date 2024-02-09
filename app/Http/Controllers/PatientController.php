<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /// Add a new patient
    public function store(Request $request)
    {
      $validator = $request->validate([
        'patientName' => 'required|alpha:ascii|max:255',
        'patientBloodGroup' => 'required',
          'patientAddress' => 'required|max:255',
          'patientMobileNumber' => 'required|digits:10',
            'patientDateOfBirth' => 'required',
    ],
    [
        'patientName.required' => "Patient's name is required.",
        'patientBloodGroup.required' => 'Blood group is required.',
            'patientAddress.required' => 'Address is required.',
            'patientMobileNumber.required' => 'Mobile number is required.',
                'patientDateOfBirth.required' => 'Date of birth is required.'
    ]);

        $patient = new Patient();
        $patient->patientName=$request->patientName;
        $patient->patientBloodGroup=$request->patientBloodGroup;
        $patient->address=$request->patientAddress;
        $patient->patientMobileNumber=$request->patientMobileNumber;
        $patient->patientDateOfBirth=$request->patientDateOfBirth;
        $patient->save();

        return redirect()->back()->with('success', 'Patient details are added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */

     //////Edit details of an existing patient
    public function update(Request $request, Patient $patient)
    {  $validator = $request->validate([
        'patientName' => 'required|alpha:ascii|max:255',
        'patientBloodGroup' => 'required',
          'address' => 'required|max:255',
          'patientMobileNumber' => 'required|digits:10',
            'patientDateOfBirth' => 'required',
    ],
    [
        'patientName.required' => "Patient's name is required.",
        'patientBloodGroup.required' => 'Blood group is required.',
            'address.required' => 'Address is required.',
            'patientMobileNumber.required' => 'Mobile number is required.',
                'patientDateOfBirth.required' => 'Date of birth is required.'
    ]);
        $patient=\App\Models\Patient::where('patientId','=',$request->patientId)->first();
        $patient->patientName=$request->patientName;
        $patient->patientBloodGroup=$request->patientBloodGroup;
        $patient->address=$request->address;
        $patient->patientMobileNumber=$request->patientMobileNumber;
        $patient->patientDateOfBirth=$request->patientDateOfBirth;
        $patient->save();
        return redirect()->route('addPatient','#updatePatientDetails')->with('success', 'Patient details are updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */

     ////Deleting a patient
    public function destroy(Request $request)
    {

          $patient=\App\Models\Patient::where('patientId','=',$request->patientId)->first();
          $patient->delete();
          return redirect()->back()->with('success', 'Patient is deleted.');
    }
}
