<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('subject_id')->unsigned();
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');

        });
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('subject_unit_id')->unsigned();
            $table->integer('subject_id')->unsigned();

            $table->foreign('subject_unit_id')->references('id')->on('subject_units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_units', function (Blueprint $table) {
            $table->dropForeign('subject_units_subject_id_foreign');
            $table->dropColumn('subject_id');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_subject_units_id_foreign');
            $table->dropForeign('courses_subject_id_foreign');
            $table->dropColumn('subject_id');
            $table->dropColumn('subject_unit_id');
        });
        Schema::dropIfExists('subject_units');
    }
}
