<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');  /** 表示 */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        $this->middleware('auth')->except(['posts,index']);  /** 投稿登録 */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    //新規投稿の保存
    {
        $post = new Post;
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->main = $request->main;
        $post->save();

        return redirect('/'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   //個別の投稿ページの表示
    {
    // URLのidと一致する投稿を取得
    $val = Post::findOrFail($id); 

    return view ('?.?')->with('val', $val);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //投稿編集画面の表示
    {
    // URLと一致する投稿を取得
    $val = Post::findOrFail($id);

    // ログインユーザーとuser_idが一致しない場合はTOPにリダイレクトする
    if($val->user_id == auth()->id()){
        return view('?.?')->with('val',$val);
    }else{
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  //投稿更新の保存
    {
     // 同じIDの投稿を探して、上書き保存
     $post = Post::findOrFail($id);
     $post->title = $request->title;
     $post->main = $request->main;
     $post->save();

     return redirect('/');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)   //投稿を削除
    {
    // URLと一致する投稿が見つかれば、削除。
    $post = Ask::findOrFail($id)->delete();

    return redirect('/'); 
    }
}
