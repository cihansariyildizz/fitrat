<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verilers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('gender');
            $table->float('height');
            $table->float('current_weight');
            $table->integer('age');
            $table->text('activity_level');
            $table->float('goal_weight');
            $table->integer('target_day');
            $table->float('target_calorie');
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
        Schema::dropIfExists('verilers');
    }
}
