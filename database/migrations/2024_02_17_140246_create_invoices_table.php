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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')
                ->references('id')->on('doctors')->onDelete('no action');
            $table->bigInteger('amount');
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });


        $permissions = [

            'view invoice'=>'نمایش صورتحساب',
            'create invoice'=>'ساخت صورتحساب',
            'update invoice'=>'اپدیت صورتحساب',
            'delete invoice'=>'حذف صورتحساب'
        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
