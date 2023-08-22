<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Post;      //モデル
use App\Comment;      //モデル
use App\Like;      //モデル
use App\User;      //モデル

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request['keyword'] )){
            $keyword = $request -> input('keyword');
            $post = Post::withCount('likes');   // データ全件取得

            return view('posts.index', [
                'posts' => $posts,
            ]);  /** 表示 */
    
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.edit');
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=Auth::user();
        $user->name = $request->name;

    if($request->file('image')){
        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('' ,$file_name,'public');
        $user->image=$file_name;
        
    }else{
        $user->image=$user->image;
    }
    $user->profile = $request->profile;
    $user->save();

    return redirect('/mypage');
}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('user_id',$id)->get();    // データ全件取得
        $user = User::find($id);
        return view('users.users')->with(['posts'=>$posts,'user'=>$user]);
    
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
    public function mypage(){

    return view('users.users');

}
}