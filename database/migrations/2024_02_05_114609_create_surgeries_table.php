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
        Schema::create('surgeries', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_national_code');
            $table->unsignedbigInteger('basic_insurance_id')->nullable();
            $table->unsignedbigInteger('supp_insurance_id')->nullable();
            $table->Integer('document_number')->unique();
            $table->text('description');
            $table->date('surgeried_at');
            $table->date('released_at');
            $table->timestamps();
        });

        $permissions = [

            'view surgeries'=>'نمایش جراحی',
            'create surgeries'=>'ساخت جراحی',
            'update surgeries'=>'اپدیت جراحی',
            'delete surgeries'=>'حذف جراحی'
        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surgeries');
    }
};
