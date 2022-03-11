<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('shop_id')->foreign('shop_id')->references('id')->on('shops');
            $table->unsignedSmallInteger('people');
            $table->date('use_date');
            $table->time('use_time');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
