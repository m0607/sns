<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Post;      //モデル
use App\Comment;      //モデル
use App\Like;      //モデル


class PostController extends Controller
{
    /**-------------------------------------
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)    //一覧表示
    {
        $like_model=new Like;
        if(isset($request['keyword'] )){
            $keyword = $request -> input('keyword');
            $post = Post::withCount('likes');   // データ全件取得
//0だけ絞り込み
        $posts = $post->where('text','LIKE','%'.$keyword.'%')     //あいまい検索
                      ->orwhere('title','LIKE','%'.$keyword.'%')
                      ->orwhere('area','LIKE','%'.$keyword.'%')->get();

        return view('posts.index', [
            'posts' => $posts,
            'like_model'=>$like_model
        ]);  /** 表示 */

    }else{
        $posts = Post::withCount('likes')->get();    // データ全件取得
//0だけ絞り込み
        return view('posts.index', [
            'posts' => $posts,   
            'like_model'=>$like_model         
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
        $post->user_id = Auth::id();             //まだ設定してないからとりあえず１
        $post->title = $request->title;
        $post->text = $request->body;
            // アップロードされたファイル名を取得
            $file_name = $request->file('image')->getClientOriginalName();
    
            // 取得したファイル名で保存
            $request->file('image')->storeAs('' ,$file_name,'public');
            $post->image=$file_name;
    
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
    $comment = Comment::where('post_id','=',$id)->get();

    return view('posts.show', [
        'post' => $post,
        'comment' => $comment
       
    ]); 


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
     if($request->file('image')){
        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('' ,$file_name,'public');
        $post->image=$file_name;
        
    }else{
        $post->image=$post->image;
    }
    //  $request->file('image')->store('images','public');  //画像表示？？？
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

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        $post = Post::findOrFail($post_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;
        $exist = Like::where('post_id', $post_id)->where('user_id', $id)->first();
        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
            'exist' => $exist
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
    public function mypage()   //個別の投稿詳細ページの表示
{

    $posts = Post::where('user_id',Auth::user()->id)->get();    // データ全件取得
    return view('users.mypage')->with('posts',$posts);

}
}
