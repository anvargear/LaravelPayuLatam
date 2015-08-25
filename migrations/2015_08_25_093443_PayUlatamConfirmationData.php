<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayUlatamConfirmationData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payu_confirmations', function($table)
        {
            $table->increments('id');
            $table->integer('reference_sale')->unsigned();
            $table->integer('state_pol');
            $table->string('response_code_pol');
            $table->string('reference_pol');
            $table->string('sign');
            $table->string('payment_method');
            $table->decimal('value');
            $table->decimal('tax');
            $table->datetime('transaction_date');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payu_confirmations');
    }
}
