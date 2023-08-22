<!-- 投稿詳細 -->
@extends('layouts.app')
@section('content')
@if(isset(Auth::user()->role) && Auth::user()->role == 0 || Auth::user()==null)

<div class="card mb-4">
    <div class="card-header">
        <span class="mr-2">
            投稿日時 {{ $post->created_at->format('Y.m.d H:i') }}
            <br>タイトル: {{ $post -> title }}</br>
            地域: {{ $post->area }}
        </span>
    </div>
</div>

<!-- ボタン -->
@if(!Auth::guest())    
    <div class="justify-content d-flex justify-content-center">
        @if(Auth::user()->id==$post->user_id)
            <form action="{{ route('posts.edit',$post->id)}}" method="get">
                <input type="submit" value="投稿編集" class="btn btn-primary mx-5">
            </form>
        @else
        
        <form action="{{ route('reports.create') }}" method="get">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="submit" value="報告" class="btn btn-warning">
        </form>
        @endif
    </div>
@endif
    <!-- テキスト -->
    <div class="justify-content d-flex justify-content-center">
    <dic class="card d-flex w-50 mt-3">
    <div class="card-title text-center text-monospace border border-warning shadow p-2 mx-5 mt-3"><h4>　投稿内容　</h4></div>
    <div class="card-body">
        <p class="text-center card-text h5">{{ $post -> text }}</p>
    </div>
</div>
<!-- 画像 -->
<div class="d-flex justify-content-center align-items-center mt-5">
@if(!empty($post -> image))
        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" style="width: 20rem" alt="投稿画像">
        @else
        <img src="{{ asset('storage/noimage.jpeg') }}" class="card-img-top" style="width: 20rem" alt="デフォルト画像">
@endif
</div>
</div>
    <!-- コメント -->
    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <div class="justify-content d-flex justify-content-center">
        <dic class="card d-flex mt-3 w-50">
            <div class="card-title text-center text-monospace border border-warning shadow p-2 mx-3 mt-3"><h4>　コメント　</h4></div>

            @foreach($comment as $come)
            <div class="card-body">
                <p class="text-center h5 text-monospace border shadow p-2 mx-3">{{ $come->comment }}</p>
            </div>
            @endforeach
        </div>
        <div class="justify-content d-flex justify-content-center mt-3">
        <input type="hidden" name="post_id" value="{{ $post-> id}}">
        <input type="text" name="comment" value="" class="margin-bottom:2rem;" required><!--required制限-->
        <input type="submit" value="送信" class="btn btn-primary">
    </div>
</div>
    </form>

<!-- 削除ボタン -->
@if(!Auth::guest())   
@if(Auth::user()->id==$post->user_id)

<form action="{{route('posts.destroy' , $post->id )}}" method="post">
    @csrf
    @method('delete')
        <div class="text-center col-lg-15 mt-4">
            <button type ="submit" class= "btn btn-primary bg-danger" onclick='return confirm("削除しますか？");'>投稿削除</button>
        </div>
</form>
@endif
@endif
@endif
@endsection