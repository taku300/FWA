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
        Schema::create('news_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link_path');
            $table->foreignId('news_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_links', function (Blueprint $table) {
            $table->dropForeign('news_links_news_id_foreign');
        });
        Schema::dropIfExists('news_links');
    }
};
