<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Student contact
        Schema::create('user_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile_phone')->nullable();
            $table->string('card_number')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('contact_id')->unsigned();

            $table->foreign('contact_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });

        // Parent children
        Schema::create('user_children', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('child_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_contacts');
        Schema::dropIfExists('user_children');

    }
}
