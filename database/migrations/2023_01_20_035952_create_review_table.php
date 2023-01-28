<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content');
            $table->Text('star');
            $table->Text('time');
            $table->bigInteger('user_id');
            $table->bigInteger('data_id');
            $table->bigInteger('tag_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->defalut('1');
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
        Schema::dropIfExists('review');
    }
};
