<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('balances', function(Blueprint $table){
            $table->increments('id');
            $table->decimal('saving_bal');
            $table->decimal('loan_bal');
            $table->decimal('repaid_bal');
            $table->decimal('debit_bal');
            $table->decimal('credit_bal');
            $table->integer('account_id')->unsigned()->index();
            $table->integer('client_id');
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
        Schema::dropIfExists('balances');
    }
}
