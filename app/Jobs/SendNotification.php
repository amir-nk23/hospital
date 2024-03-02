<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {




        $payments = Payment::query()->where('pay_type','cheque')->where('status',1)->where('due_date','>=',Carbon::now()->subDay(3))->get();



        foreach ($payments as $payment){

            foreach ($payment->invoices->surgeries as $surgery){

                Notification::query()->create([

                    'title'=>'پرداخت چک',
                    'body'=>'موعد چک بیمار'.' '.$surgery->patient_name.' '.'در تاریخ'.$payment->jalalidate('due_date',true).' '.'با شناسه'.' '.$payment->id.' '.'در حال فرا رسیدن است',
                    'status'=>0

                ]);


            }


        }

    }
}
