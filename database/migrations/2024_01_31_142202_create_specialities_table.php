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
        Schema::create('specialities', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });


    $view_specialities = \Spatie\Permission\Models\Permission::create(
            [
                'name'=>'view specialities',
                'label'=>'نمایش تخصص'
            ]);
    $create_specialities = \Spatie\Permission\Models\Permission::create([
            'name'=>'create specialities',
            'label'=>'ایجاد  تخصص'

        ]);
    $update_specialities = \Spatie\Permission\Models\Permission::create([
            'name'=>'update specialities',
            'label'=>'ویرایش  تخصص'
        ]);

    $delete_specialities = \Spatie\Permission\Models\Permission::create([
            'name'=>'delete specialities',
            'label'=>'حذف  تخصص'
        ]);

    $role = \Spatie\Permission\Models\Role::where('name','admin')->get();

    $role->givePermissionTo($view_specialities);

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialities');
    }
};
