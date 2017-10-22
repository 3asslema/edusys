<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        // Add foreign key discipline to subjects
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('discipline_id')->unsigned();

            $table->foreign('discipline_id')->references('id')->on('disciplines')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_discipline_id_foreign');
            $table->dropColumn('discipline_id');
        });
        Schema::dropIfExists('disciplines');
    }
}
