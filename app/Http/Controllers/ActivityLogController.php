<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{

    public function index()
    {

      $activities =  Activity::query()->paginate(12);


        return view('log.index',compact('activities'));

    }
}
