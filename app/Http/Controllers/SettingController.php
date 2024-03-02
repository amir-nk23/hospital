<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuItemStoreRequest;
use App\Models\Category;
use App\Models\MenuGroup;
use App\Models\MenuItem;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yoeunes\Toastr\Facades\Toastr;

class SettingController extends Controller
{

    public function index(){


        return view('setting.index');

    }

    public function general(){

        $generals = Setting::query()->where('group','general')->get();
        return view('setting.edit',compact('generals'));

    }



    public function social(){

        $generals = Setting::query()->where('group','social')->get();
        return view('setting.edit',compact('generals'));


    }

    public function update(Request $request)
    {

        $input = $request->except('_token','_method');

        foreach ($input as $name => $value){

            if ($setting = Setting::where('name',$name)->first()){

                if ($setting->type=='img'&& $request->file($name)->isValid()){

                    if ($setting->value){

                        Storage::disk('public')->delete($setting->value);

                    }

                    $value =   Storage::disk('public')->put('/setting',$request->img);

                }

                $setting->update(['value'=>$value]);

            }

        }

        Toastr::success('تنظیمات با موفقیت تغییر یافت');
        return redirect()->route('setting.index');

    }


    public function destroy(Setting $setting){


        Storage::disk('public')->delete($setting->value);

        $setting->update([

            'value'=>''

        ]);


        return redirect()->back();

    }


}
