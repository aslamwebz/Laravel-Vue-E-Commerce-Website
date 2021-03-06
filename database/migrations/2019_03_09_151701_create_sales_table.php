<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('items');
            $table->date('sale_date');
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_contact');
            $table->string('customer_email');
            $table->string('payment_type');
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('tax', 8, 2)->nullable();
            $table->string('sold_by');
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
        Schema::dropIfExists('sales');
    }
}
