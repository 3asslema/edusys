<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile_phone')->unique();
            $table->boolean('receive_sms')->default(true);
            $table->timestamps();
        });

        Schema::create('student_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('parent_id')->unsigned();

            $table->unique(['student_id', 'parent_id'], 'student_parent_unique');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('contacts')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_contact');
        Schema::dropIfExists('contacts');
    }
}
