<?php

namespace App\Http\Controllers;

use App\Models\DoctorRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorRoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DRs = DoctorRole::query()->get();
        return view('doctor_role.index',compact('DRs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor_role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DoctorRole::query()->create($request->all());

        Toastr()->success('نقش دکتر با موفقیت ایجاد شد');
        return redirect()->route('doctor.role.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorRole $doctorRole)
    {


        return view('doctor_role.edit',compact('doctorRole'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoctorRole $speciality)
    {
        $request->validate([

            'title'=>'required',
        ],
            [
                'title.required'=>'لطفا نام نقش را وارد کنید'
            ]);
        DoctorRole::query()->update($request->except(['_method','_token']));
        Toastr()->info('تخصص با موفقیت ویرایش شد');
        return redirect()->route('doctor.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $speciality = DB::table('doctor_role')->where('id',$id)->delete();

        Toastr()->error('نقش دکتر با موفقیت حذف شد');
        return redirect()->route('doctor.role.index');

    }


}
