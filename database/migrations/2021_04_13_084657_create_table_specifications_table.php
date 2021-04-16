<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('Band');
            $table->string('Display');
            $table->string('Memory');
            $table->string('Camera_front');
            $table->string('Operating');
            $table->string('Chip');
            $table->string('Ram');
            $table->string('Sim');
            $table->string('Battery');
            $table->string('Security');
            $table->string('Camera_rear');
            $table->string('Mass');
            $table->string('Design');
            $table->string('Wifi');
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
        Schema::dropIfExists('specifiactions');
    }
}
