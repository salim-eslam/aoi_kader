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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('name');
            $table->text('description');
            $table->string('image');
            $table->integer('length');
            $table->integer('height');
            $table->integer('width');
            $table->string('material');
            $table->integer('offer_price')->nullable();
            $table->enum('offerd', [ 'true', 'false'])->default('false');
            $table->enum('stocked', [ 'true', 'false'])->default('true');
            $table->enum('status', [ 'active', 'disabled']);
            $table->foreignId('department_id')->nullable();
            $table->integer('views')->default(0);
            $table->text('seo_description')->nullable(0)->default(null);
            $table->text('seo_keywords')->nullable(0)->default(null);

            // $table->integer('views')->default(0);

            // $table->foreignId('category_id')->nullable();
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
        Schema::dropIfExists('products');
    }
};
