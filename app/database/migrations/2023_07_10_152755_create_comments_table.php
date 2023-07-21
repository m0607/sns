<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');   /** ID */
            $table->integer('user_id');    /** ユーザーID */
            $table->integer('post_id');    /** 投稿ID */
            $table->text('comment');       /** コメント内容 */
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
        Schema::dropIfExists('comments');
    }
}
