<?php

namespace App\Http\Controllers;

use App\Models\DoctorRole;
use App\Models\Insurance;
use App\Models\Operation;
use App\Models\Surgery;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $surgeries = Surgery::query()->with(['basicInsurance','suppinsurance'])->get();

        return view('surgery.index',compact('surgeries',));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $insurance = Insurance::query()->get();
        $basics = $insurance->where('type','basic');
        $supplementaries = $insurance->where('type','supplementary');
        $operations = Operation::query()->where('status',1)->get();
        $roles = DoctorRole::query()->where('status',1)->with('doctor')->get();
        return view('surgery.create',compact('basics','supplementaries','operations','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
