<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationStoreRequest;
use App\Http\Requests\OperationUpdateRequest;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $OPs = Operation::query()->get();
        return view('operation.index',compact('OPs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OperationStoreRequest $request)
    {

        Operation::query()->create($request->all());

        Toastr()->success('عمل دکتر با موفقیت ایجاد شد');
        return redirect()->route('operation.index');

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
    public function edit(Operation $operation)
    {

        return view('operation.edit',compact('operation'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OperationUpdateRequest $request, Operation $operation)
    {
        Operation::query()->update($request->except(['_method','_token']));
        Toastr()->info('تخصص با موفقیت ویرایش شد');
        return redirect()->route('operation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $speciality = DB::table('operations')->where('id',$id)->delete();

        Toastr()->error('نقش دکتر با موفقیت حذف شد');
        return redirect()->route('operation.index');

    }


}
