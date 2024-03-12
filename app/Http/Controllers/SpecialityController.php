<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialityStoreRequest;
use App\Models\DoctorRole;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Toastr;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialities = Cache::rememberForever('speciality',function (){

            return Speciality::query()->paginate(10);

        });
        return view('speciality.index',compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('speciality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialityStoreRequest $request)
    {

        Speciality::query()->create($request->all());

        Toastr()->success('تخصص با موفقیت ایجاد شد');
        return redirect()->route('speciality.index');

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
    public function edit(Speciality $speciality)
    {

        return view('speciality.edit',compact('speciality'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speciality $speciality)
    {
        $request->validate([

            'title'=>'required',
        ],
        [
            'title.required'=>'لطفا نام تخصص را وارد کنید'
        ]);

        $speciality->update($request->only(['title','status']));
        Toastr()->info('تخصص با موفقیت ویرایش شد');
        return redirect()->route('speciality.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $speciality = DB::table('specialities')->where('id',$id)->delete();

        Toastr()->error('تخصص با موفقیت حذف شد');
        return redirect()->route('speciality.index');

    }
}
