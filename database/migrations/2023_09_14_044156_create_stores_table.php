<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->string('store_name', 30);
            $table->string('store_image', 255)
                ->nullable(true);
            $table->text('store_comment')
                ->length(100)
                ->nullable(true);
            $table->text('current_location')
                ->nullable(true);
            $table->tinyInteger('opening_flag')
                ->default(0)
                ->comment('0:閉店,1:開店');
            $table->timestamp('closing_datetime')
                ->nullable(true);
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
        Schema::dropIfExists('stores');
    }
}
