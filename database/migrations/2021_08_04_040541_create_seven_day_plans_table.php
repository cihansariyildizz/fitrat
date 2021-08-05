<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevenDayPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seven_day_plans', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('category');
            $table->text('day1');
            $table->text('day2');
            $table->text('day3');
            $table->text('day4');
            $table->text('day5');
            $table->text('day6');
            $table->text('day7');
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
        Schema::dropIfExists('seven_day_plans');
    }
}
