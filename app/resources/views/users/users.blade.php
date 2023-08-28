<!-- ログインしてる他のユーザーページ -->
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@if( !empty(Auth::user()->image) )
    <p><img src="{{ asset('storage/'.Auth::user()->image) }}" class="card-img-top ml-3 mt-3" style="width: 300px; height: 200px; border-radius:50%;" alt="写真"></p><!--ユーザーアイコン-->
@else
    <img src="{{ asset('storage/noimage.jpeg') }}" class="card-img-top" style="width: 300px; height: 200px; border-radius:50%;" alt="デフォルト写真">
@endif
    <p>{{ $user->name }}</p>
    <p>{{ $user->profile }}</p>
    <body>
        <div class="container">
            <h2 style="color: #494949; border-left: solid 5px #7db4e6;">投稿一覧</h2>
            <div class="d-flex justify-content-around flex-wrap">
                @foreach($posts as $post)
                    <div class="my-3 mx-auto col-md-4">
                    <div class="card">
                    <div class="card-body">
                @if(empty(Auth::user()->image))
                    <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="アイコン画像">
                @else
                    <img src="{{ asset('storage/noimage.jpeg') }}" class="card-img-top" alt="デフォルト画像">
                @endif
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->text }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary rounded-pill">詳細</a>
                    </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>

@endsection
