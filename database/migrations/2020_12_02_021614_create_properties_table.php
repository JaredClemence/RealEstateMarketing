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
            /* @var $table Blueprint */
            $table->id();
            $table->string('status')->default('ACTIVE');
            $table->string('status_date')->default('1979-01-01');
            $table->string('address')->default('');
            $table->string('city')->default('Bakersfield');
            $table->string('state')->default('CA');
            $table->string('zip')->default('93306');
            $table->string('beds')->default('');
            $table->string('baths')->default('');
            $table->string('sqft')->default('');
            $table->string('image1')->default('image1.jpg');
            $table->string('image2')->default('image2.jpg');
            $table->string('brochure')->default('');
            $table->string('virtual_tour')->default('');
            $table->text('teaser_prompt');
            $table->text('teaser_text');
            $table->text('virtual_embed');
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
