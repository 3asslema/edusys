<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacilityIdToScolarYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scolar_years', function (Blueprint $table) {
            $table->integer('facility_id')->unsigned();

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
        Schema::table('scolar_years', function (Blueprint $table) {
            $table->dropForeign('scolar_years_facility_id_foreign');
            $table->dropColumn('facility_id');
        });
    }
}
