<?php

namespace App\Http\Controllers\Api\Surgry;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurgeryController extends Controller
{

    public function index(){

        $id =Auth::id();

        $surgery = Doctor::query()->with('surgery')->where('id',$id)->get();

        return response()->success('',compact('surgery'));

    }
}
