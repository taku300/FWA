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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category');
            $table->date('noticed_at');
            $table->string('title');
            $table->string('note')->nullable();
            $table->text('detail')->nullable();
            $table->tinyInteger('preliminary_report_flag')->default(0)->nullable();
            $table->string('iframe_path')->nullable();
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
        Schema::dropIfExists('news');
    }
};
