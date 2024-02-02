<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    use \App\Traits\HasPermission;
    public function up(): void
    {
        Schema::create('doctor_role', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $permissions = [

            'view doctor_role'=>'نماش نقش پزشک',
            'create doctor_role'=>'ساخت نقش پزشک',
            'update doctor_role'=>'اپدیت نقش پزشک',
            'delete doctor_role'=>'حذف نقش پزشک'

        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_role');
    }
};
