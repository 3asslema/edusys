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
        });

    }
}
