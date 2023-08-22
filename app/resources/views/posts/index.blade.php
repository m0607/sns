<!-- 新規投稿一覧画面 -->

@extends('layouts.app')
@section('content')
@if(isset(Auth::user()->role) && Auth::user()->role == 0 || Auth::user()==null)
@if(isset(Auth::user()->del_flg) && Auth::user()->del_flg == 0)
<div class="card-header"></div>  <!--カードヘッダー-->
    <div class="text-center col-lg-15 mt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('posts.serch') }}" method="get">
                        @csrf
                        <div class="d-flex flex-column justify-content-center input-daterange" id="datepicker" style="margin-left:13rem;">
                            <div class="bg-success text-center"><h5>　タイトル・内容・地域　</h5></div>
                            <input type="text" name="keyword" value="" placeholder="キーワードを入力して下さい" style="margin-bottom:2rem;">  <!--value-->
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

<div class="text-center col-lg-15 mt-5">
    <body>
        <h2>投稿一覧</h2>
            @foreach($posts as $post)
            @section('title', '新規投稿')
            @if($post->del_flg!=1)
                <div class="row">
                    <div class="my-3 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                @if(!empty($post -> image))
                            <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="デフォルト写真">
                        @else
                            <img src="{{ asset('storage/noimage.jpeg') }}" class="card-img-top" alt="投稿写真">
                        @endif
                            <p><a href="{{ route('users.show', $post ->user->id) }}">{{ $post -> user->name }}</a></p>
                                <h5 class="card-title">タイトル:{{ $post -> title }}</h5>
                                <p class="card-text">内容:{{ $post -> text }}</p>
                                <p class="card-text">地域:{{ $post -> area }}</p>
                                <a href="{{ route('posts.show', $post -> id ) }}" class="btn btn-primary">詳細</a>

                                    @if($like_model->like_exist(Auth::user()->id,$post->id))
                                    <p class="favorite-marke">
                                    <a class="js-like-toggle loved" href="" data-postid="{{ $post->id }}"><button class="btn like">❤︎</button></a>
                                    <span class="likesCount">{{$post->likes_count}}</span>
                                    </p>
                                    @else
                                    <p class="favorite-marke">
                                    <a class="js-like-toggle" href="" data-postid="{{ $post->id }}"><button class="btn like">♡</button></a>
                                    <span class="likesCount">{{$post->likes_count}}</span>
                                    </p>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            </body>
        </div>
    </div>
</div>
@elseif(Auth::user())
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
                            <div class="bg-success text-center"><h5>　タイトル・内容・地域　</h5></div>
                            <input type="text" name="keyword" value="" placeholder="キーワードを入力して下さい" style="margin-bottom:2rem;">  <!--value-->
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
                                    <a href="{{ route('login') }}" class="btn btn-primary">新規投稿</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center col-lg-15 mt-5">
    <body>
        <h2>投稿一覧</h2>
            @foreach($posts as $post)
            @section('title', '新規投稿')
                <div class="row">
                    <div class="my-3 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                            <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="...">
                            <p><a href="{{ route('users.show', $post ->user->id) }}">{{ $post -> user->name }}</a></p>
                                <h5 class="card-title">タイトル:{{ $post -> title }}</h5>
                                <p class="card-text">内容:{{ $post -> text }}</p>
                                <p class="card-text">地域:{{ $post -> area }}</p>
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
@else
<p>一般ユーザーページです</p>
@endif
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function () {
    var like = $('.js-like-toggle');
    var likePostId;
    
    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'post_id': likePostId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した時
            .done(function (data) {
    //lovedクラスを追加
    if(data.exist == null){
                    $this.children().html('♡');
                }else{
                    $this.children().html('❤︎');
                }    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {

            //エラー内容が詳しくわかる
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });

</script>