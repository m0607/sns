<!-- ユーザー検索 -->
@extends('layouts.app')
@section('content')

<h5>　管理者専用ユーザー検索　</h5>

<div class="d-flex flex-row mt-5">
    <h5>　ユーザー名　</h5>
    <input type="text" name="keyword" style="margin-bottom:2rem;">  <!--value-->
        <div class="mt-0.1">
            <input type="submit" value="探す" class="btn btn-primary mx-3" name="serch">
        </div>
</div>
<!-- ブートストラップのテーブルの中でフォーイーチ -->
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">ユーザーid</th>
      <th scope="col">ユーザー名</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">投稿数</th>
      <th scope="col"></th>

    </tr>
</thead>
<tbody>
@foreach($admin as $a)
    <tr>
      <td scope="row">{{ $a->id }}</td>
      <td>{{ $a->name }}</td>
      <td>{{ $a->email }}</td>
      <td>{{ $a->post_count }}</td>
    <td><a href="{{ route('admin.delete',$a->id) }}" class="btn btn-primary">表示停止</a></td>
    </tr>
@endforeach
  </tbody>
</table>

@endsection