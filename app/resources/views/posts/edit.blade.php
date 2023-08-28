<!-- 投稿編集画面 -->
 <!--外部化-->
@extends('layouts.app')
@section('content')
@if(isset(Auth::user()->role) && Auth::user()->role == 0 || Auth::user()==null)

<div class="container">
    <h1>投稿編集</h1>
    <form action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('put')
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post -> title }}" placeholder="タイトルを入力してください">
        </div>
        <div class="d-flex flex-column bd-highlight mb-3">
            <label for="image">画像</label>
            <input type="file" name="image" id="image">
            <img id="preview"> 
        </div>
        <div class="form-group">
            <label for="area">投稿所在地</label>
            <textarea name="area" id="area" class="form-control" rows="1" placeholder="投稿所在地を入力してください">{{ $post -> area }}</textarea>
        </div>
        <div class="form-group">
            <label for="body">エピソード</label>
            <textarea name="text" id="body" class="form-control" rows="5" placeholder="エピソードを入力してください">{{ $post -> text }}</textarea>
        </div>
                <input type="submit" value="編集" class="btn button-004">
                <input type="reset" value="キャンセル" class="btn button-004-3" onclick='window.history.back(-1);'>
    </form>
</div>
@endif
@endsection
