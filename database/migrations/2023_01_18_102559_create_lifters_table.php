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
        Schema::create('lifters', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_kana');
            $table->string('last_name_kana');
            $table->tinyInteger('gender');
            $table->tinyInteger('category');
            $table->foreignId('affiliation_id');
            $table->tinyInteger('weight_class');
            $table->string('image_path');
            $table->string('performance')->nullable();
            $table->date('birthday')->nullable();
            $table->string('comment')->nullable();
            $table->tinyInteger('top_post_flag')->default(0)->nullable();
            $table->timestamps( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lifters');
    }
};
