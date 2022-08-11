<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggableStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggable_stores', function (Blueprint $table) {
            $table->id();
            $table->integer('sku');
            $table->integer('barcode');
            $table->decimal('price', 18,6);
            $table->longText('description');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('store_data_id');
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('store_data_id')->references('id')->on('store_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taggable_stores');
    }
}
