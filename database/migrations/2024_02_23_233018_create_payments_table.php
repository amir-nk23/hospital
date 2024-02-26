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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
                ->references('id')->on('invoices')->onDelete('cascade');
            $table->bigInteger('amount');
            $table->enum('pay_type',['cash','cheque']);
            $table->date('due_date')->nullable();
            $table->string('receipt');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $permissions = [

            'view payment'=>'نمایش پرداختی',
            'create payment'=>'ساخت پرداختی',
            'update payment'=>'اپدیت پرداختی',
            'delete payment'=>'حذف پرداختی'
        ];

        $permissionNames = $this->createPermissions($permissions);

        $this->assignPermissions($permissionNames,'admin');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
