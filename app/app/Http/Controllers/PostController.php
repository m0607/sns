<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;      //モデル

class PostController extends Controller
{
    /**-------------------------------------
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)    //一覧表示
    {
        if($post = request('posts')){
            $keyword=$request->keyword;
        $a=Post::where('title','text','area','%$keyword%')->get();

    }else{
        $posts = \DB::table('posts')->get();    // データ全件取得

        return view('posts.index', [
            'posts' => $posts,
            'keyword'=>$a,
            // 'title' =>  $title,
        ]);  /** 表示 */
    }
    }

    /**-------------------------------------
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        return view('posts.create');  /** 投稿登録表示 */
    }

    /**-------------------------------------
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    //新規投稿の保存
    {

        $post = new Post;
        $post->user_id = 1;             //まだ設定してないからとりあえず１
        $post->title = $request->title;
        $post->text = $request->body;
        $post->image = $request->image;
        $post->area = $request->area;
        $post->save();

        return redirect('/posts'); 
    }

    /**-------------------------------------
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   //個別の投稿詳細ページの表示
    {
    // URLのidと一致する投稿を取得
    $post = Post::find($id);    //findOrFail 404エラーになる

    return view('posts.show')->with('post', $post);
    }


    /**-------------------------------------
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //投稿編集画面の表示
    {
    // URLと一致する投稿を取得
    $post = Post::find($id);  //findOrFail 404エラーになる

    return view('posts.edit')->with('post', $post);
    }

    // ログインユーザーとuser_idが一致しない場合はTOPにリダイレクトする{
    

    /**-------------------------------------
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  //投稿更新の保存
    {
     // 同じIDの投稿を探して、上書き保存
     $post = Post::find($id);
     
     $post->title = $request ->title;
     $post->area = $request->area;
     $post->text = $request->text;
     $post->save();

        return redirect('/posts');
    }

    /**-------------------------------------
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)   //投稿を削除
    {

    $post = new Post;  //インスタンス化 
    $d = $post->find($id)->delete();  //->探してくる

    return redirect('/posts');   //return viewでもいけるけどindexと同じもの書かないと行けないからredirect
    }
}
