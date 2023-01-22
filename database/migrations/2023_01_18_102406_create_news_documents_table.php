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
        Schema::create('news_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('document_path');
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
        Schema::table('news_documents', function (Blueprint $table) {
            $table->dropForeign('news_documents_news_id_foreign');
        });
        Schema::dropIfExists('news_documents');
    }
};
