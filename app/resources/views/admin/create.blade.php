<!-- 投稿検索 -->
@extends('layouts.app')
@section('content')

<h5>　管理者専用投稿一覧　</h5>

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
    <tr>
      <td scope="row">{{ $a->id }}</td>
      <td>{{ $a->user->name }}</td>
      <td>{{ $a->title }}</td>
      <td>{{ $a->created_at }}</td>
      <td>{{ $a->report_count }}</td>

    <td><a href="{{ route('post.delete',$a->id) }}" class="btn btn-primary">表示停止</a></td>
    </tr>
@endforeach
  </tbody>
</table>

@endsection