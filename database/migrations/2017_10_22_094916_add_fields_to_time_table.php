<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('time_tables', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('tutor_id')->unsigned();
            $table->integer('classroom_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_tables', function (Blueprint $table) {
            $table->dropForeign('time_tables_course_id_foreign');
            $table->dropForeign('time_tables_classroom_id_foreign');
            $table->dropForeign('time_tables_tutor_id_foreign');

            $table->dropColumn('subject_id');
            $table->dropColumn('classroom_id');
            $table->dropColumn('tutor_id');
        });
    }
}