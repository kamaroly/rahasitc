<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_id');
            $table->string('consumer_id');
            $table->string('country');
            $table->string('correlation_id');
            $table->string('msisdn',12);
            $table->string('pin')->default('****');
            $table->string('company_id');
            $table->string('reference');
            $table->decimal('amount',10,2);
            $table->integer('api_key_id', false, true)->nullable();
            $table->timestamps();

            $table->softDeletes();

            
            $table->foreign('api_key_id')->references('id')->on('api_keys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill_payments');
    }
}
