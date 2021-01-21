<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('contact1');
            $table->string('contact2')->nullable();
            $table->longtext('address1');
            $table->longtext('address2')->nullable();
            $table->string('google');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('twitter');
            $table->longtext('footer');
            $table->string('meta_name')->nullable();
            $table->longtext('meta_keyword')->nullable();
            $table->longtext('meta_description')->nullable();
            $table->longtext('google_analyst')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert(
        array(
            'title' => 'Education',
            'email1' => 'name@domain.com',
            'contact1' => '789456123',
            'address1' => 'Jaipur',
            'google' => 'google@gmail.com',
            'facebook' => 'facebook@gmail.com',
            'linkedin' => 'linkedin@gmail.com',
            'twitter' => 'twitter@gmail.com',
            'footer' => 'Copyright @ 2020 Reserved',
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
