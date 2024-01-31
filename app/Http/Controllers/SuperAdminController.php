<?php

namespace App\Http\Controllers;
use App\Http\Requests\SuperAdminCreateRequest;
use App\Http\Requests\SuperAdminUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yoeunes\Toastr\Toastr;

class SuperAdminController extends Controller
{
    public function index():Renderable
    {

        $users = \App\Models\User::query()->latest('id')->get();
        return view('user.superadmin.index',compact('users'));
    }

    public function create()
    {

        $permissions = Permission::query()->get();
        return view('user.superadmin.create',compact('permissions'));

    }


    public function store(SuperAdminCreateRequest $request)
    {

        $user = User::query()->create([

            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,

        ]);

        $permissions = $request->permissions;

        foreach ($permissions as $permission){

            $user->givePermissionTo($permission);

        }


        \toastr()->success('کاربر با موفقیت ایجاد شد');

        return redirect()->route('superadmin.index');

    }

    public function edit(User $user)
    {

        $permissions = Permission::query()->get();
        $userPermissions = $user->getAllPermissions()->toArray();

        return view('user.superadmin.edit',compact('user','permissions','userPermissions'));


    }

    public function update(SuperAdminUpdateRequest $request,User $user)
    {

        if (filled($request->password)){

            $request->validate([

                'password'=>'min:6'

            ],

             [
                'password.min'=>'رمز عبور نباید کم تر از 6 کاراکتر باشد'


             ]

            );


        }

        if (!$request->password){
            $user->update([

                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,

            ]);
        }else{

            $user->update([

                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'password'=>$request->password

            ]);

        }


        $user->syncPermissions($request->permissions);


        \toastr()->info('کاربر با موفقیت ویرایش شد');


        return redirect()->route('superadmin.index');

    }

    public function destroy(User $user)
    {

        $user->permissions()->detach();
        $user->delete();

        return redirect()->back();

    }
}
