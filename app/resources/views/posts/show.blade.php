<!-- 投稿詳細 -->
@extends('layouts.app')
@section('content')
        <div class="mb-4">
        <p>{{ $user->name }}の投稿</p>
        </div>

        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    タイトル: {{ $post->title }}
                    投稿者:  <a href="{{route('users.show', $post->user_id)}}">{{ $user->name }}</a>
                </div>
                <div class="card-body">
                    <p class="card-text">
                    <li> {{ \Illuminate\Support\Str::limit($post->body, 140) }}
                    </p>
                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        続きを読む
                    </a>
                    <p class="card-text">
                        @foreach ($post->tags as $tag) 
                            <a href="{{route('top', ['tag_id'=>$tag->id])}}">
                                {{ $tag->name }}
                            </a>
                        @endforeach 
                    </p>

                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d H:i') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
        @endforeach
        @endsection