<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previos_works', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->text('body');
            $table->string('image');
            $table->integer('views')->default(0);
            $table->text('seo_description')->nullable(0)->default(null);
            $table->text('seo_keywords')->nullable(0)->default(null);

            $table->enum('status', [ 'active', 'disabled']);
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
        Schema::dropIfExists('previos_works');
    }
};
