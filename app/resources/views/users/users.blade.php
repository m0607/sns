@extends('layouts.app')
@section('content')

<p><img src="{{ asset('storage/'.$user->image) }}"></p>

<p>{{ $user->name }}</p>

<p>{{ $user->profile }}</p>
<body>
        <h2>投稿一覧</h2>
            @foreach($posts as $post)
                <div class="row">
                    <div class="my-3 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                            <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="...">
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
