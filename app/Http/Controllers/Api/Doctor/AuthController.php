<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
           'mobile'=>'required|digits:11',
            'password'=>'required|min:6|string'
        ]);

        $doctor = Doctor::query()->where('mobile',$request->input('mobile'))->first();


        $password = bcrypt($request->input('password'));

        if (!$doctor ||!Hash::check($request->input('password'),$password)){

            return response()->error('اطلاعات اشتباه وارد شده است',[],422);

        }

        $token = $doctor->createToken('authToken');
        Sanctum::actingAs($doctor);

        $data = [
            'doctor'=>$doctor,
            'access_token'=>$token->plainTextToken,
            'token_type'=> 'Bearer'

        ];

        return  response()->success('کاربر با موفقیت وارد شد',compact('data'));

    }

    public function logout(Request $request){

        $doctor = $request->user();
        $doctor->currentAccessToken()->delete();

        return response()->success('کاربر با موفقیت خارج شد');
    }
}
