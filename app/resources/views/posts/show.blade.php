<!-- 投稿詳細 -->
@extends('layouts.app')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <span class="mr-2">
            投稿日時 {{ $post->created_at->format('Y.m.d H:i') }}
            <br>タイトル: {{ $post -> title }}</br>
        </span>
    </div>
</div>

<!-- ボタン -->
    <div class="justify-content space-around">   <!--水平にしたい-->
        <input type="submit" value="いいね" class="btn btn-primary bg-warning text-dark ml-5">
            <div class="text-right">
                <form action="{{ route('posts.edit',$post->id)}}" method="get">
                    <input type="submit" value="投稿編集" class="btn btn-primary mx-5">
                </form>
                    
                    <input type="submit" value="報告" class="btn btn-primary mx-5">
            </div>
    </div>

<!-- テキスト -->
<div class="card-body">
    <p class="card-text">{{ $post -> text }}</p>
</div>

<!-- 画像 -->



<!-- 削除ボタン -->
<form action="{{route('posts.destroy' , $post->id )}}" method="post">
    @csrf
    @method('delete')
        <div class="text-center col-lg-15 mt-4">
            <button type ="submit" class= "btn btn-primary bg-danger" onclick='return confirm("削除しますか？");'>投稿削除</button>
        </div>
</form>
@endsection