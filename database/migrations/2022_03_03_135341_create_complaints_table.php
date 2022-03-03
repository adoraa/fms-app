<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'complaints';

    /**
     * Run the migrations.
     * @table complaints
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('user_id', 15);
            $table->integer('utitlity_id');
            $table->string('description', 45)->nullable();
            $table->integer('unit_id');
            $table->timestamp('created_at')->nullable();
            $table->string('head_of_user', 15);
            $table->timestamp('time_head_of_uer_approved')->nullable();
            $table->string('head_of_unit_approval', 15);
            $table->timestamp('time_head_of_unit_approved')->nullable();
            $table->string('estate_manager_approval', 15);
            $table->timestamp('time_estate_manager_approved')->nullable();
            $table->string('user_assigned', 15);
            $table->timestamp('time_user_assigned')->nullable();
            $table->tinyInteger('material_gotten')->nullable();
            $table->timestamp('time_material_gotten')->nullable();
            $table->timestamp('time_reached')->nullable();
            $table->timestamp('time_job_completed')->nullable();
            $table->string('review')->nullable();
            $table->timestamp('time_job_rated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
