<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToScolarYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add fields and program relation
        Schema::table('scolar_years', function (Blueprint $table) {
            $table->string('name');
            $table->integer('scolar_program_id')->unsigned();
            $table->integer('tuition_fee_id')->unsigned();

            $table->foreign('tuition_fee_id')->references('id')->on('tuition_fees')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('scolar_years', function (Blueprint $table) {
            $table->dropForeign('scolar_years_scolar_program_id_foreign');
            $table->dropForeign('scolar_years_tuition_fee_id_foreign');
            $table->dropColumn('name');
            $table->dropColumn('tuition_fee_id');
            $table->dropColumn('scolar_program_id');
        });
    }
}
