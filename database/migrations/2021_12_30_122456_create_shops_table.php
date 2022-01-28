<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('genre_id');
            $table->string('summary',190);
            $table->time('open_time');
            $table->time('close_time');
            $table->string('image_url',100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCuurent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
