<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikesController;



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//投稿
Route::resource('/posts','PostController');

//マイページ
Route::get('/mypage', 'PostController@mypage')->name('mypage');
//ユーザー情報編集
Route::resource('/users','UsersController');

//検索
Route::get('/posts', 'PostController@index')->name('posts.serch');

//いいね
Route::get('likes','PostController@index')->name('posts.index');
Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');
//いいね一覧
Route::get('/likes',[LikesController::class,'index'])->name('likes.index');//ユーザーボタン押して飛ぶ


//報告
Route::resource('/reports','ReportsController');

//管理者ページ
Route::get('/admin',[AdminController::class,'admin']);//管理者ページに飛んでくるための
Route::get('/user',[AdminController::class,'admin1'])->name('admin.serch');//ユーザーボタン押して飛ぶ
Route::get('/create',[AdminController::class,'admin2'])->name('admin.post');//投稿ボタン押して飛ぶ

//ユーザー表示停止
Route::get('/user_delete/{id}',[AdminController::class,'admin_delete'])->name('admin.delete');

//投稿表示停止
Route::get('/post_delete/{id}',[AdminController::class,'post_delete'])->name('post.delete');

//コメント
Route::resource('/comments','CommentsController');
