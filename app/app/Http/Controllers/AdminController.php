<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\User;      //モデル
use App\Post;      //モデル



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth::user()->role==1){//０ユーザーの時、１ユーザーの時、if文
            return view('admin.'); //１ユーザーの時 admin.blade を表示
            }else{
                return redirect('/posts'); //view()はviewsフォルダーの表示させたいbladeファイル書く
            }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function admin(){

        return view('admin.admin');
    }
    public function admin1(){ //ユーザー検索

        $admin = User::withCount('post')->where('del_flg','=','0')->where('role','=','0')->get();    // データ全件取得
        
        return view('admin.user', [
            'admin' => $admin,            
           
        ]); 

    }
    public function admin2(){
        $admin = Post::withCount('report')->where('del_flg','=','0')->get();    // データ全件取得
        return view('admin.create', [
            'admin' => $admin,            
           
        ]); 

    }
    public function admin_delete($id){
        $user=User::find($id);
        $user->del_flg=1;
        $user->save();
    return redirect('/user');
    }

    public function post_delete($id){
        $post=Post::find($id);
        $post->del_flg=1;
        $post->save();
    return redirect('/create');
    }

}

