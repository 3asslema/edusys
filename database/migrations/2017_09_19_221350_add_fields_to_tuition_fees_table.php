<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTuitionFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add fields to tuition fees table
        Schema::table('tuition_fees', function (Blueprint $table) {
            $table->string('name');
            $table->boolean('is_scolar_year_fee');
            $table->integer('cost');
            $table->integer('periodicity');
            $table->integer('scolar_program_id')->unsigned();
            $table->integer('facility_id')->unsigned();

            $table->foreign('facility_id')->references('id')->on('facilities')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('scolar_program_id')->references('id')->on('scolar_programs')->onUpdate('cascade')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tuition_fees', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('is_scolar_year_fee');
            $table->dropColumn('cost');
            $table->dropColumn('periodicity');
            $table->dropForeign('tuition_fees_scolar_program_id_foreign');
            $table->dropColumn('scolar_program_id');
            $table->dropForeign('tuition_fees_facility_id_foreign');
            $table->dropColumn('facility_id');
        });

    }
}
