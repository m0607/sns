<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');  /** ID */
            $table->string('name');       /** ユーザー名 */
            $table->string('email')->unique();  /** unique 重複しないように **/
            $table->timestamp('email_verified_at')->nullable();  /** あってもなくてもいい? */
            $table->string('password');  /** パスワード */
            $table->string('image');     /** ユーザーアイコン */
            $table->string('profile');   /** プロフィール */
            $table->integer('role');     /** ユーザー区分 */
            $table->integer('del_flg');  /** ユーザー論理削除 */
            $table->rememberToken();     /** ログイン維持用トークン **/
            $table->timestamps();        /** 登録日時、更新日時？ */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
