<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('subject_unit_id')->unsigned();
            $table->integer('tutor_id')->unsigned();
            $table->integer('student_class_id')->unsigned();
            $table->integer('scolar_year_id')->unsigned();
            $table->integer('academic_year_id')->unsigned();
            $table->integer('academic_year_term_id')->unsigned();

            $table->foreign('unit_subject_id')->references('id')->on('subject_units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_class_id')->references('id')->on('student_classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('scolar_year_id')->references('id')->on('scolar_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('academic_year_term_id')->references('id')->on('academic_year_terms')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_subject_unit_id_foreign');
            $table->dropForeign('courses_tutor_id_foreign');
            $table->dropForeign('courses_student_class_id_foreign');
            $table->dropForeign('courses_scolar_year_id_foreign');
            $table->dropForeign('courses_academic_year_id_foreign');
            $table->dropForeign('courses_academic_year_term_id_foreign');

            $table->dropColumn('subject_unit_id');
            $table->dropColumn('tutor_id');
            $table->dropColumn('student_class_id');
            $table->dropColumn('scolar_year_id');
            $table->dropColumn('academic_year_id');
            $table->dropColumn('academic_year_term_id');
        });
    }
}
