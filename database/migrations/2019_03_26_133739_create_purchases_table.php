<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('purchases');
            $table->date('purchase_date');
            $table->string('supplier_name');
            $table->string('supplier_address');
            $table->string('supplier_contact');
            $table->string('supplier_email')->nullable();
            $table->string('payment_type');
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('tax', 8, 2)->nullable();
            $table->string('purchased_by');
            $table->integer('total');
            $table->integer('grand_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
