<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWebNotificationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_notifications', function(Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->integer('user_id');
            $table->integer('historable_id');
            $table->string('historable_type');
            $table->string('message');
            $table->string('thumbnail');
            $table->string('seenState');
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
        Schema::drop('web_notifications');
    }

}
