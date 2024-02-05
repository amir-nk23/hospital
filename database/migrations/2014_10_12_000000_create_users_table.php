<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobile');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

      $user =  \App\Models\User::query()->create([

            'name'=>'امیر',
            'email'=>'amir@gmail.com',
            'mobile'=>'09395439774',
            'password'=>bcrypt('123456'),

        ]);

      $superAdmin=\Spatie\Permission\Models\Role::create([
          'name'=>'super_admin',
          'label'=>'مدیر ارشد'
      ]);
      $Admin=\Spatie\Permission\Models\Role::create([
          'name'=>'admin',
          'label'=>'ادمین'
      ]);

      $user->assignRole($superAdmin);

      \Spatie\Permission\Models\Permission::create(
          [
              'name'=>'view users',
              'label'=>'نمایش کاربر'
          ]);
      \Spatie\Permission\Models\Permission::create([
          'name'=>'create users',
          'label'=>'ایجاد  کاربر'

      ]);
      \Spatie\Permission\Models\Permission::create([
          'name'=>'update users',
          'label'=>'ویرایش  کاربر'
      ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'delete users',
            'label'=>'حذف  کاربر'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
