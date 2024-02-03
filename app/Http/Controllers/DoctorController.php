<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::query()->get();
        return view('user.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $specialities = Speciality::query()->get();
        return view('user.doctor.create',compact('specialities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Doctor::query()->create([

            'name'=>$request->name,
            'speciality_id'=>$request->speciality_id,
            'national_code'=>$request->national_code,
            'medical_number'=>$request->medical_number,
            'mobile'=>$request->mobile,
            'status'=>$request->status,
            'password'=>bcrypt($request->password),

        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
