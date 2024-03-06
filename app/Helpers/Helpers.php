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

        $settings = Cache::rememberForever('settings',function (){

          return  Setting::query()
                ->select('id','label','value','name')
                ->get();

        });

        $setting = $settings->where('name',$key)->first();

        return $setting?$setting->value : $deafault;

    }


}
