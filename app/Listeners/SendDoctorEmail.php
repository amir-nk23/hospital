<?php

namespace App\Listeners;

use App\Events\DoctorEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendDoctorEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(DoctorEmail $event): void
    {

        Mail::to($event->doctor->email)->send(new \App\Mail\DoctorEmail($event->doctor));
    }
}
