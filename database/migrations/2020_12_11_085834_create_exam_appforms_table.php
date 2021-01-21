<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamAppformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_appforms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('long_description');
            $table->longText('short_description');
            $table->string('meta_name');
            $table->longText('meta_description');
            $table->longText('meta_keyword');
            $table->string('sort_order')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('exams_id');
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
        Schema::dropIfExists('exam_appforms');
    }
}
