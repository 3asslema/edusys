<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramToFacility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add program relation
        Schema::table('scolar_programs', function (Blueprint $table) {
            $table->string('name');
            $table->integer('parent_id')->unsigned()->nullable();

            $table->foreign('parent_id')->references('id')->on('scolar_programs')->onUpdate('cascade')->onDelete('cascade');
        });


        // Add program facility relation
        Schema::create('facility_scolar_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facility_id')->unsigned();
            $table->integer('scolar_program_id')->unsigned();

            $table->unique(['facility_id', 'scolar_program_id'], 'facility_scolar_program_unique');
            $table->foreign('scolar_program_id')->references('id')->on('scolar_programs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('facility_id')->references('id')->on('facilities')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scolar_programs', function (Blueprint $table) {
            $table->dropForeign('scolar_programs_parent_id_foreign');
            $table->dropColumn('parent_id');
            $table->dropColumn('name');
        });
        Schema::dropIfExists('scolar_program_scolar_years');
        Schema::dropIfExists('facility_scolar_programs');
    }
}
