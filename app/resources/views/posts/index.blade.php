<!-- 新規投稿一覧画面 -->

@extends('layouts.app')
@section('content')

<div class="card-header"></div>  <!--カードヘッダー-->
    <div class="text-center col-lg-15 mt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('posts.index') }}" method="get">
                        <div class="input-daterange input-group" id="datepicker">
                        <h5>　タイトル・内容・地域　</h5>
                            <input type="text" name="keyword">  <!--value-->
                                <div class="input-group-prepend">
                                    <h5>　日付検索　</h5>
                                    <span class="input-group-text">開始日付</span>
                                </div>
                                <input type="date" class="input-sm form-control" name="from">
                                    　~　
                                    <div class="input-group-append">
                                        <span class="input-group-text">終了日付</span>
                                    </div>
                                        <input type="date" class="input-sm form-control" name="to">

                                        <input type="submit" value="探す" class="btn btn-primary mx-3">
                    </form>
                                        <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ララベルの書き方にする -->
<div class="text-center col-lg-15 mt-5">
    <body>
        <h2>投稿一覧</h2>
            @foreach($posts as $post)
            if
            @section('title', '新規投稿')
                <div class="row">
                    <div class="my-3 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post -> title }}</h5>
                                <p class="card-text">{{ $post -> text }}</p>
                                <a href="{{ route('posts.show', $post -> id ) }}" class="btn btn-primary">詳細</a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </body>
        </div>
    </div>
</div>
@endsection