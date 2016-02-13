<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuysellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buysells', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id',false)->nullable();
            $table->text('method')->nullable();
            $table->text('img')->nullable();
            $table->text('ps')->nullable();
            $table->string('wallet_address')->nullable();
            $table->string('wait_hour')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_price')->nullable();
            $table->string('total')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->softDeletes();
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
        //
    }
}
