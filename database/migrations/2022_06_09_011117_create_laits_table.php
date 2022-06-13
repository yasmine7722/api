<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laits', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('temps');
            $table->unsignedInteger('id_vache');
            $table->float('qte', 8, 6); 
            $table->string('matiere_grasse');
            $table->float('ph', 8, 6); 
            $table->float('densite', 8, 6); 
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
        Schema::dropIfExists('laits');
    }
}
