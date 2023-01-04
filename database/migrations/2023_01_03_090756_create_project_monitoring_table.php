<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_monitoring', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('client');
            $table->bigInteger('leader_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('progress');
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
        Schema::dropIfExists('project_monitoring');
    }
};
