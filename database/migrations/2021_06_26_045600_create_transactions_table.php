<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("uuid");
            $table->string("name");
            $table->string("email");
            $table->string("number");
            $table->string("address");
            $table->integer("transaction_total");
            $table->integer("province");
            $table->integer("city");
            $table->string("courier");
            $table->integer("courier_price");
            $table->enum("transaction_status", ['PENDING', 'PAID', 'PACKING', 'ON DELIVERY', 'DONE', 'FAILED']);
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
        Schema::dropIfExists('transactions');
    }
}
