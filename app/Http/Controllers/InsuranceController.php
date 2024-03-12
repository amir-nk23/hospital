<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceStoreFormRequest;
use App\Http\Requests\InsuranceUpdateFormRequest;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $insurances =    Cache::rememberForever('insurance',function (){

            return Insurance::query()->where('status',1)->paginate('10');

        });

        return view('insurance.index',compact('insurances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insurance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsuranceStoreFormRequest $request)
    {

        Insurance::query()->create($request->all());
        toastr()->success('بیمه با موفقیت ثبت شد');
        return redirect()->route('insurance.index');
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
    public function edit(Insurance $insurance)
    {
        return view('insurance.edit',compact('insurance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InsuranceUpdateFormRequest $request, Insurance $insurance)
    {

        $insurance->update($request->all());

        return redirect()->route('insurance.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
