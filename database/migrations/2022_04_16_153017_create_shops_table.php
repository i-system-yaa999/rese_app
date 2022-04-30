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
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name',191)->comment('店名');
            $table->unsignedInteger('area_id')->comment('エリアID');
            $table->unsignedInteger('genre_id')->comment('ジャンルID');
            $table->text('summary')->comment('店舗紹介文');
            $table->string('image_url', 191)->comment('画像保存先URL');
            $table->unsignedInteger('likes_count')->comment('お気に入り登録者数');
            $table->timestamp('created_at')->useCurrent()->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->useCurrent()->nullable()->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
