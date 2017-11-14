<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->text('message')->nullable();
            $table->text('misc')->nullable();
            $table->string('price')->nullable();
            $table->string('type');
            $table->string('origin')->nullable();
            $table->integer('total_sms')->nullable();
            $table->timestamp('schedule')->nullable();
            $table->integer('campaign_id');
            $table->integer('company_id');
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
        Schema::dropIfExists('messages');
    }
}
