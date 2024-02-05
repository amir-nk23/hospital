<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorStoreFormRequest;
use App\Http\Requests\DoctorUpdateFormRequest;
use App\Models\Doctor;
use App\Models\DoctorRole;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::query()->get();
        $doctors->load([
           'speciality'

        ]);
        return view('user.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctorRoles=DoctorRole::query()->where('status',1)->get();
        $specialities = Speciality::query()->where('status',1)->get();
        return view('user.doctor.create',compact('specialities','doctorRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorStoreFormRequest $request)
    {

        $doctorRoles=$request->doctor_roles;

      $doctor =  Doctor::query()->create([

            'name'=>$request->name,
            'speciality_id'=>$request->speciality_id,
            'national_code'=>$request->national_code,
            'medical_number'=>$request->medical_number,
            'mobile'=>$request->mobile,
            'status'=>$request->status,
            'password'=>bcrypt($request->password),

        ]);


      $doctor->doctor_role()->attach($doctorRoles);
        toastr()->success('دکتر با موفقیت ثبت شد');
        return redirect()->route('doctor.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {

        $doctorRoles=DoctorRole::query()->where('status',1)->get();
        $specialities = Speciality::query()->where('status',1)->get();
        return view('user.doctor.edit',compact('doctor','specialities','doctorRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorUpdateFormRequest $request, Doctor $doctor)
    {

        $doctorRoles=$request->doctor_roles;
        $doctor->doctor_role()->sync($doctorRoles);
        if ($request->password){

            $password = $doctor->password;


        }else{

            $password=$request->password;
        }

        $doctor->update([

            'name'=>$request->name,
            'speciality_id'=>$request->speciality_id,
            'national_code'=>$request->national_code,
            'medical_number'=>$request->medical_number,
            'mobile'=>$request->mobile,
            'status'=>$request->status,
            'password'=>bcrypt($password),

        ]);




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
