<!-- マイページ -->

@extends('layouts.app')
@section('content')
<div class=>
    <a href="{{ route('users.create') }}" class="btn btn-primary">ユーザー情報編集</a>
        @if( Auth::user()-> image)
            <p><img src="{{ asset('storage/'.Auth::user()->image) }}" class="card-img-top ml-3 mt-3" style="width: 300px; height: 200px; border-radius:50%;" alt="写真"></p><!--ユーザーアイコン-->
        @else
            <img src="{{ asset('storage/noimage.jpeg') }}" class="card-img-top" alt="デフォルト写真">
        @endif
</div>
        <p>{{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->profile }}</p>
        <body>
            <h2>投稿一覧</h2>
                @foreach($posts as $post)
                    <div class="row">
                        <div class="my-3 mx-auto col-md-4" style="width: 40rem">
                            <div class="card">
                                <div class="card-body">
                                    @if(!empty(Auth::user() -> image))
                                        <p><img src="{{ asset('storage/'.Auth::user()->image) }}" class="card-img-top" style="border-radius:50%;" alt="写真"></p><!--ユーザーアイコン-->
                                    @elseif(empty(Auth::user() -> image))
                                        <img src="{{ asset('storage/noimage.jpeg') }}" class="card-img-top" alt="デフォルト写真">
                                    @endif

                                    @if(!empty($post -> image))
                                        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="投稿画像">
                                    @else
                                        <img src="{{ asset('storage/noimage.jpeg') }}" class="card-img-top" alt="デフォルト画像">
                                    @endif
                                        <h5 class="card-title">{{ $post -> title }}</h5>
                                        <p class="card-text">{{ $post -> text }}</p>
                                        <a href="{{ route('posts.show', $post -> id ) }}" class="btn btn-primary">詳細</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </body>
@endsection
