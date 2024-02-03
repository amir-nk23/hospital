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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->bigInteger('price');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $permissions = [

            'view operation'=>'نماش عمل ها',
            'create operation'=>'ساخت عمل ها',
            'update operation'=>'اپدیت عمل ها',
            'delete operation'=>'حذف عمل ها'
        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opration');
    }
};
