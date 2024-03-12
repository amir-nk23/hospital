<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Surgery;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{

    public function index():Renderable
    {

        $doctors = Doctor::query()->where('status',1)->count();
        $invoice = Invoice::query()

            ->where(function ($query){

                $query->where('created_at','<=',now())->where('created_at','>=',Carbon::now()->subMonth());

        })->sum('amount');
        $payment = Payment::query()->where('status',1)
            ->where(function ($query){

            $query->where('created_at','<=',now())->where('created_at','>=',Carbon::now()->subMonth());

        })->sum('amount');
        $surgery = Surgery::query()->where(function ($query){

            $query->where('created_at','<=',now())->where('created_at','>=',Carbon::now()->subMonth());

        })->count();

        $paymentsDash = Payment::query()->latest()->take('10')->get();
        $logs = Activity::query()->latest()->take(6)->get();

        return view('dashboard.index',compact('doctors','invoice','payment','surgery','paymentsDash','logs'));

    }


}
