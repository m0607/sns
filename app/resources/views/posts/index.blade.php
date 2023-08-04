<!-- 新規投稿一覧画面 -->

@extends('layouts.app')
 
@section('content')
<div class="card-header"></div>  <!--カードヘッダー-->
    <div class="container">
        <div class="row">
        <div class="col-10">
            <div class="input-daterange input-group" id="datepicker">
            <input type="text" name="keyword">  <!--value-->
            <div class="input-group-prepend">
                <h5>日付検索</h5>
                <span class="input-group-text">開始日付</span>
            </div>
            <input type="date" class="input-sm form-control" name="from" />
            ~
            <div class="input-group-append">
                <span class="input-group-text">終了日付</span>
            </div>
                <input type="date" class="input-sm form-control" name="to" />
            <form>
                <input type="submit" value="探す" class="btn btn-primary">
                <input type="submit" value="新規投稿" class="btn btn-primary">
            </form>
            </div>
        </div>
        </div>
    </div>
<!-- ララベルの書き方にする -->
        <div class="text-center col-lg-15 mt-5">
            <body>
                <h2>投稿一覧</h2>
                @foreach($posts as $post)
                <div class="row">
                    <div class="my-3 mx-auto col-md-4">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ 1 }}</h5>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-primary">詳細</a>
                        </div>
                        </div>
                    </div>
                    <div class="my-3 mx-auto col-md-4">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ 2 }}</h5>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-primary">詳細</a>
                        </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                        <div class="text-center mt-4 mx-auto">
                            <a href="ルートにする" class="card-link"><1</a>
                            <a href="ルートにする" class="card-link">2</a>
                            <a href="#" class="card-link">3</a>
                            <a href="#" class="card-link">4></a>
                        </div>

                    <!-- @foreach($posts as $post)
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ 1 }}</h5>
                            <p class="card-text"></p>
                            <a href="ルートにする" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                    @endforeach -->
            </body>
        </div>
    </div>
</div>
@endsection