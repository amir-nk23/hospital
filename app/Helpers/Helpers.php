<?php

namespace App\Helpers;

use App\Models\Notification;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class Helpers
{

    public static function notification()
    {

        return $notifications = Notification::query()->where('viewed_at',null)->get();

    }

    public static function setting(string $key ,string $deafault = ''){

        $setting = Cache::rememberForever('settings',function (){

          return  Setting::query()
                ->select('id','label','value','name')
                ->get();

        });

        return $setting->where('name',$key)->first();

    }


}
