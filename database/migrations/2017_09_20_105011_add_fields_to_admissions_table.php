<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->integer('created_by_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->integer('scolar_year_id')->unsigned();
            $table->string('status');
            $table->string('attachments');
            $table->timestamps();

            $table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('scolar_year_id')->references('id')->on('scolar_years')->onUpdate('cascade')->onDelete('cascade');

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

    }
}
