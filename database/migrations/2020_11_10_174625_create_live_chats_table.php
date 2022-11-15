<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('whatsapp_no')->nullable();
            $table->text('whatsapp_title')->nullable();
            $table->text('whatsapp_greeting')->nullable();
            $table->string('whatsapp_color')->nullable();
            $table->boolean('whatsapp_position')->default('1');
            $table->boolean('whatsapp_status')->default('1');
            $table->string('facebook_id')->nullable();
            $table->text('facebook_greeting_in')->nullable();
            $table->text('facebook_greeting_out')->nullable();
            $table->string('facebook_color')->nullable();
            $table->boolean('facebook_position')->default('1');
            $table->boolean('facebook_status')->default('1');
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('live_chats');
    }
}
