<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_id')->unsigned();
            $table->integer('complaint_id')->unsigned();
            $table->integer('quantity');

           
            $table->timestamps();

            $table->foreign('material_id')
            ->references('id')->on('materials')
            ->onDelete('no action')
            ->onUpdate('no action');

        $table->foreign('complaint_id')
            ->references('id')->on('complaints')
            ->onDelete('no action')
            ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_complaints');
    }
}
