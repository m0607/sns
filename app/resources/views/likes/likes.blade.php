<!-- いいね画面？ -->

@extends('layouts.app')
@section('content')


<div class="justify-content d-flex justify-content-center">
        <dic class="card d-flex mt-3 w-50">
            <div class="card-title text-center text-monospace border border-warning shadow p-2 mx-3 mt-3"><h4>　いいね一覧　</h4></div>

            @foreach($post as $val) <!---->
            @foreach($like as $val2)
            @if($val->id == $val2->post_id)
            <div class="card">
            <div class="card-body">
                <p class="text-center h5 text-monospace border shadow p-2 mx-3">タイトル: {{ $val-> title}}</p>
                <p class="text-center h5 text-monospace border shadow p-2 mx-3">内容: {{ $val-> text}}</p>
                <div class="d-flex justify-content-center align-items-center mt-2">
        <img src="{{ asset('storage/'.$val->image) }}" class="card-img-top" style="width: 10rem" alt="...">
        <a href="{{ route('posts.show', $val -> id ) }}" class="btn btn-primary ml-2">詳細</a>

    </div>
    </div>

            </div>
            @endif
            @endforeach
            @endforeach
        </div>
</div>

@endsection