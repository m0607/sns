<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; //

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //auth::user()ログインしたユーザー情報取得
        //auth::id()ログインしたユーザーのidが取得できる
        if(auth::user()->role==0){//０ユーザーの時、１ユーザーの時、if文書く
        return redirect('/posts'); //Home見にくるんじゃなくてPostsコントローラーいってほしいredirect
        }else{
            return redirect('/admin');
        }
    }
        }