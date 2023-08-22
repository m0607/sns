<!-- 管理者投稿検索 -->
@extends('layouts.app')
@section('content')

<h5>　管理者専用投稿一覧　</h5>

<form action="{{ route('admin.post') }}" method="get"> <!--web.name見る-->
  <div class="d-flex flex-row mt-5">
      <h5>　タイトル　</h5>
      <input type="text" name="keyword" style="margin-bottom:2rem;">  <!--value-->
          <div class="mt-0.1">
              <input type="submit" value="探す" class="btn btn-primary mx-3" name="serch">
          </div>
  </div>
</form>

<!-- ブートストラップのテーブルの中でフォーイーチ -->
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">投稿id</th>
      <th scope="col">ユーザー名</th>
      <th scope="col">タイトル</th>
      <th scope="col">投稿日時</th>
      <th scope="col">報告件数</th>
      <th scope="col"></th>

    </tr>
</thead>
<tbody>
@foreach($admin as $a)
@if($a->del_flg!=1)
    <tr>
      <td scope="row">{{ $a->id }}</td>
      <td>{{ $a->user->name }}</td>
      <td>{{ $a->title }}</td>
      <td>{{ $a->created_at }}</td>
      <td>{{ $a->report_count }}</td>
      <td><a href="{{ route('post.delete',$a->id) }}" class="btn btn-primary">投稿表示停止</a></td>
    </tr>
    @else
    @endif
@endforeach
  </tbody>
</table>

@endsection