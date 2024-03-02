<?php

namespace App\Helpers;

use App\Models\Notification;

class Helpers
{

    public static function notification()
    {



        return $notifications = Notification::query()->where('viewed_at',null)->get();


    }


}
