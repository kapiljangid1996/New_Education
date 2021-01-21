<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('ownership');
            $table->longText('long_description');
            $table->longText('short_description');
            $table->string('city');
            $table->string('state');
            $table->longText('street');
            $table->integer('post_code');
            $table->string('contact1');
            $table->string('contact2')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('website');
            $table->string('image');
            $table->string('logo');
            $table->string('meta_name');
            $table->longText('meta_description');
            $table->longText('meta_keyword');
            $table->string('sort_order')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('colleges');
    }
}
