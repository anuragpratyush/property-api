<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('county', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('town', 100)->nullable();
            $table->string('postalcode', 30)->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('image_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('price')->nullable();
            $table->char('property_type', 100)->nullable();
            $table->char('type', 30)->nullable();
            $table->char('data_from', 30)->nullable();
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
        Schema::dropIfExists('properties');
    }
}
