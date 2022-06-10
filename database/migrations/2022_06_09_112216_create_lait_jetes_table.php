<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaitJetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lait_jetes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('temps');
            $table->unsignedInteger('id_lait');
            $table->float('qte', 6, 4); 
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
        Schema::dropIfExists('lait_jetes');
    }
}
