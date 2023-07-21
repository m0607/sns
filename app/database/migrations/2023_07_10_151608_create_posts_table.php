<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');   /** ID */
            $table->integer('user_id');    /** ユーザー名 */
            $table->string('title');       /** タイトル */
            $table->text('text');          /** 投稿内容 */
            $table->string('image');       /** 投稿画像 */
            $table->string('area');        /** 留学地域 */
            $table->timestamps();          /** 登録日時、更新日時？ */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
