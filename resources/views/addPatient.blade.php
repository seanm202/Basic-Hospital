<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add / Edit Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div style="color:green;" class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
                  <h2>Add patient details</h2>
                  {{ Form::open(array('route' => 'addPatientDetails')) }}
                  {{Form::token()}}
                  {{Form::label('patientName', "Enter Patient's Name")}}
                  {{Form::text('patientName','',array('placeholder'=>"Enter Patient's Name"))}}<br><br>
                  @if($errors->has('patientName'))
                    <div class="error">{{ $errors->first('patientName') }}</div>
                  @endif
                  {{Form::label('patientBloodGroup', "Enter Patient's Name")}}
                  {{Form::text('patientBloodGroup','',array('placeholder'=>"Enter Blood Group"))}}<br><br>
                  @if($errors->has('patientBloodGroup'))
                    <div class="error">{{ $errors->first('patientBloodGroup') }}</div>
                  @endif
                  {{Form::label('patientAddress', "Enter Patient's Name")}}
                  {{Form::text('patientAddress','',array('placeholder'=>"Enter Address"))}}<br><br>
                  @if($errors->has('patientAddress'))
                    <div class="error">{{ $errors->first('patientAddress') }}</div>
                  @endif
                  {{Form::label('patientMobileNumber', "Enter Patient's Name")}}
                  {{Form::text('patientMobileNumber','',array('placeholder'=>"Enter Mobile Number"))}}<br><br>
                  @if($errors->has('patientMobileNumber'))
                    <div class="error">{{ $errors->first('patientMobileNumber') }}</div>
                  @endif
                  {{Form::label('patientDateOfBirth', "Enter Patient's Name")}}
                  {{Form::date('patientDateOfBirth','',array('placeholder'=>"Enter Date Of Birth"))}}<br><br>
                  @if($errors->has('patientDateOfBirth'))
                    <div class="error">{{ $errors->first('patientDateOfBirth') }}</div>
                  @endif
                  {{Form::submit('Submit')}}
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12" id="updatePatientDetails">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="overflow-x:scroll;">

                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div style="color:green;" class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
                  <h2>Update patient details</h2>
                @if(count($patients=\App\Models\Patient::all())>0)
                  @foreach(($patients=\App\Models\Patient::all()) as $patient)
                    <table class="table">
                      <tr>
                        <th scope="col">Patient Id</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Address</th>
                        <th scope="col">Patient Blood Group</th>
                        <th scope="col">Patient Mobile Number</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Update/<br>Delete</th>
                      </tr>
                      <tr>
                        <td scope="row">{{$patient->patientId}}</td>{{ Form::open(array('route' => 'updatePatientDetails')) }}
                        {{Form::token()}}
                        <td>{{Form::text('patientName',$patient->patientName)}}</td>
                        <td>{{Form::text('address',$patient->address)}}</td>
                        <td>{{Form::text('patientBloodGroup',$patient->patientBloodGroup)}}</td>
                        <td>{{Form::number('patientMobileNumber',$patient->patientMobileNumber)}}</td>
                        <td>{{Form::date('patientDateOfBirth',$patient->patientDateOfBirth)}}</td>
                        <td>{{Form::hidden('patientId',$patient->patientId)}}
                        {{Form::submit('Update', ['style' => 'background-color:green;color:white;'])}}
                        {{ Form::close() }}<br><br>
                        {{ Form::open(array('route' => 'deletePatientDetails')) }}
                        {{Form::token()}}
                        {{Form::hidden('patientId',$patient->patientId)}}
                        {{Form::submit('Delete', ['style' => 'background-color:red;color:white;'])}}
                        {{ Form::close() }}</td>
                      </tr>
                    </table>
                    @endforeach
                @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
