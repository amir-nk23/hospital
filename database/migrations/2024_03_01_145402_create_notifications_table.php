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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->timestamp('viewed_at')->nullable();
            $table->timestamps();
        });


        $permissions = [

            'view notification'=>'نمایش اعلان',
            'create notification'=>'ساخت اعلان',
            'update notification'=>'اپدیت اعلان',
            'delete notification'=>'حذف اعلان'
        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
