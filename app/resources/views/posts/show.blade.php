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
    <div class="justify-content d-flex justify-content-center">
        <input type="submit" value="いいね" class="btn btn-primary bg-warning text-dark">
                <form action="{{ route('posts.edit',$post->id)}}" method="get">
                    <input type="submit" value="投稿編集" class="btn btn-primary mx-5">
                </form>

                <form action="{{ route('reports.create') }}" method="get">
                @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="submit" value="報告" class="btn btn-primary">
                </form>
    </div>
<div class="ml-5">
    <!-- テキスト -->
    <div class="card-body">
        <p class="card-text">{{ $post -> text }}</p>
    </div>
    <!-- コメント -->

    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <h5>　コメント　</h5>
        @foreach($comment as $come)

        <p>{{ $come->comment }}</p>

        @endforeach
        <input type="hidden" name="post_id" value="{{ $post-> id}}">
        <input type="text" name="comment" value="" style="margin-bottom:2rem;" required><!--required制限-->
        <input type="submit" value="送信" class="btn btn-primary">
    </form>

    <!-- 画像 -->
    <img src="{{ asset($post->image) }}">

</div>

<!-- 削除ボタン -->
<form action="{{route('posts.destroy' , $post->id )}}" method="post">
    @csrf
    @method('delete')
        <div class="text-center col-lg-15 mt-4">
            <button type ="submit" class= "btn btn-primary bg-danger" onclick='return confirm("削除しますか？");'>投稿削除</button>
        </div>
</form>
@endsection