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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('speciality_id');
            $table->foreign('speciality_id')
                ->references('id')->on('specialities')->onDelete('no action');
            $table->string('national_code')->nullable();
            $table->string('medical_number')->nullable();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $permissions = [

            'view doctor'=>'نماش دکتر ها',
            'create doctor'=>'ساختعمل دکتر ها',
            'update doctor'=>'اپدیت دکتر ها',
            'delete doctor'=>'حذف دکتر ها'
        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_tables');
    }
};
