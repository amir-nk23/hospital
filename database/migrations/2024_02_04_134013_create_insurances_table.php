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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('type',['basic','supplementary']);
            $table->tinyInteger('percentage');
            $table->boolean('status')->default('1');
            $table->timestamps();
        });

        $permissions = [

            'view insurance'=>'نماش بیمه',
            'create insurance'=>'ساخت بیمه',
            'update insurance'=>'اپدیت بیمه',
            'delete insurance'=>'حذف بیمه'
        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
