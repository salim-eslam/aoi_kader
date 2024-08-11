<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
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
            $table->string('site_name');
            $table->string('site_logo');
            $table->string('site_email');
            $table->string('site_phone');
            $table->string('site_address');
            $table->string('site_facebook');
            $table->string('site_twitter');
            $table->string('site_instagram');
            $table->string('site_youtube');
            $table->string('site_copyright');
            $table->text('site_about');
            $table->text('site_contact');
            $table->string('site_title');
            $table->string('site_description');
            $table->string('site_keywords');

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
        Schema::dropIfExists('settings');
    }
};
