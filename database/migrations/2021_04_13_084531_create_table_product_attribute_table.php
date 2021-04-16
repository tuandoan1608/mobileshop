<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('attibutevalue_id');
            $table->integer('import_price');
            $table->integer('export_price');
            $table->integer('quantity');
            $table->integer('quantity_sell');
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
        Schema::dropIfExists('product_attribute');
    }
}
