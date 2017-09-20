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
            $table->integer('facility_id')->unsigned();
            $table->integer('academic_year_id')->unsigned();
            $table->string('status');
            $table->string('attachments');
            $table->timestamps();

            $table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('scolar_year_id')->references('id')->on('scolar_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('facility_id')->references('id')->on('facilities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropForeign('admissions_created_by_id_foreign');
            $table->dropForeign('admissions_student_id_foreign');
            $table->dropForeign('admissions_contact_id_foreign');
            $table->dropForeign('admissions_scolar_year_id_foreign');
            $table->dropForeign('admissions_facility_id_foreign');
            $table->dropForeign('admissions_academic_year_id_foreign');
            $table->dropColumn('created_by_id');
            $table->dropColumn('student_id');
            $table->dropColumn('contact_id');
            $table->dropColumn('scolar_year_id');
            $table->dropColumn('facility_id');
            $table->dropColumn('academic_year_id');
        });

    }
}
