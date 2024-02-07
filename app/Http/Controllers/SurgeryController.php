<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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

        $surgeries = Surgery::query()->with(['basicInsurance','suppinsurance','operation'])->get();

        $amount =0;
        foreach ($surgeries as $surgery){

            foreach ($surgery->operation as $operation){


                $amount += $operation->pivot->amount;


             }
          }

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
        $roles = DoctorRole::query()->where('status',1)->with('doctors')->get();
        return view('surgery.create',compact('basics','supplementaries','operations','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $operations = $request->operation_id;

        $surgery = Surgery::query()->create($request->only(['patient_name','patient_national_code','basic_insurance_id','supp_insurance_id','document_number','description','surgeried_at','released_at']));

        $amounts = Operation::query()->whereIn('id',$operations)->select( 'id' ,'price')->get();



        foreach ($amounts as $amount){


                $surgery->operation()->attach($amount->id,['amount' => $amount->price]);


        }
        $doctors = $request->doctor_id;


        $roles =$request->role_id;


        $doctorlength = count($doctors);
        $roleslength = count($roles);


        for ($i=0;$i<$doctorlength;$i++){

            $surgery->doctor()->attach($doctors[$i],['doctor_role_id'=>$roles[$i]]);

        }

        toastr()->success('عمل جراحی با موفقیت ثبت شد');
        return redirect()->route('surgery.index');

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
    public function edit(Surgery $surgery)
    {
        $insurances = Insurance::query()->get();
        $basics = $insurances->where('type','basic');
        $supplementaries = $insurances->where('type','supplementary');
        $operations = Operation::query()->where('status',1)->get();
        $doctorsID = $surgery->doctors->where('pivot.doctor_role_id', 3);
        $roles = DoctorRole::query()->where('status',1)->with(['doctors'])->get();
        $surgery->load([
            'doctors'
        ]);

        return view('surgery.edit',compact('surgery','basics','supplementaries','operations','roles','doctorsID'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surgery $surgery)
    {

         $surgery->update($request->only(['patient_name','patient_national_code','basic_insurance_id','supp_insurance_id','document_number','description','surgeried_at','released_at']));

        $operations = $request->operation_id;

        $amounts = Operation::query()->whereIn('id',$operations)->select( 'id' ,'price')->get();

        foreach ($amounts as $amount){



            $surgery->operation()->sync($amount->id,['amount' => $amount->price]);


        }

        $doctors = $request->doctor_id;


        $roles =$request->role_id;


        $doctorlength = count($doctors);
        $roleslength = count($roles);


        $surgery->doctors()->detach($surgery->id,'surgery_id');
        for ($i=0;$i<$doctorlength;$i++){

            $surgery->doctors()->attach($doctors[$i],['doctor_role_id'=>$roles[$i]]);

        }

        toastr()->info('عمل جراحی با موفقیت ویرایش شد');
        return redirect()->route('surgery.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
