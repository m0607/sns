<!-- 新規投稿一覧画面 -->

@extends('layouts.app')
@section('content')
@if(Auth::user()->del_flg===1)

<p>停止されています</p>

@else
<div class="card-header"></div>  <!--カードヘッダー-->
    <div class="text-center col-lg-15 mt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('posts.serch') }}" method="get">
                        @csrf
                        <div class="d-flex flex-column justify-content-center input-daterange" id="datepicker" style="margin-left:13rem;">
                            <h5>　タイトル・内容・地域　</h5>
                            <input type="text" name="keyword" value="" style="margin-bottom:2rem;">  <!--value-->
                            <h5>　日付検索　</h5>
                            <div>
                                <div class="text-center" style="margin-bottom:1rem;">
                                    <span class="input-group-text" style="justify-content: center">開始日付</span>
                                    <input type="date" class="input-sm form-control" name="from" value="" style="text-align: center;">
                                </div>
                                <h5>　to　</h5>
                                <div class="text-center" style="margin-top:1rem;">
                                    <span class="text-center input-group-text" style="justify-content: center">終了日付</span>
                                    <input type="date" class="input-sm form-control" name="to" style="text-align: center;">
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="探す" class="btn btn-primary mx-3" name="serch">
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
@endif
@endsection