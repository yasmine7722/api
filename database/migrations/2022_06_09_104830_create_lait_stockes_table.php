<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaitStockesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lait_stockes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('temps');
            $table->unsignedInteger('id_lait');
            $table->unsignedInteger('id_tank');
            $table->float('qte', 6, 4); 
            $table->string('matiere_grasse');
            $table->float('ph', 6, 4); 
            $table->float('densite', 6, 4); 
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
        Schema::dropIfExists('lait_stockes');
    }
}
