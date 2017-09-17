<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisations', function(Blueprint $table) {
            $table->string('name');
            $table->string('address');
           $table->string('phone');
           $table->string('fax');
           $table->string('email');
           $table->string('website');
        });
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('website');
            $table->integer('organisation_id')->unsigned();
            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisations', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('fax');
            $table->dropColumn('email');
            $table->dropColumn('website');
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->dropForeign('facilities_organisation_id_foreign');
            $table->dropColumn('organisation_id');
        });
        Schema::dropIfExists('facilities');
    }
}
