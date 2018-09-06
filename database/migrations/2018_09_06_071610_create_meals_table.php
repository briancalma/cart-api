<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_id',100)->nullable();
            $table->string('name',100)->nullable();
            $table->string('price',100)->nullable();
            $table->text('description')->nullable();
            $table->string('status',100)->default('available');
            $table->string('menu_type',100)->nullable();
            $table->string('banner',100)->nullable();
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
        Schema::dropIfExists('meals');
    }
}
