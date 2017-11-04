<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

        });
        Schema::table('scolar_years', function (Blueprint $table) {
            $table->integer('study_program_id')->unsigned();

            $table->foreign('study_program_id')->references('id')->on('study_programs')->onUpdate('cascade')->onDelete('cascade');

        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('study_program_id')->unsigned();
            $table->foreign('study_program_id')->references('id')->on('study_programs')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scolar_years', function (Blueprint $table) {
            $table->dropForeign('scolar_years_study_program_id_foreign');
            $table->dropColumn('study_program_id');
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_study_program_id_foreign');
            $table->dropColumn('study_program_id');
        });

        Schema::dropIfExists('study_programs');
    }
}
