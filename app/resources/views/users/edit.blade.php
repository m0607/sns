<!--  -->

@extends('layouts.app')
@section('content')

<div class="container">
    <h1>ユーザー情報編集</h1>
    <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="post">
    @csrf
        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" name="name" id="title" class="form-control" value="{{ Auth::user()->name }}" placeholder="名前を入力してください">
        </div>
        <div class="d-flex flex-column bd-highlight mb-3">
            <label for="image">アイコン</label>
            <input type="file" name="image" id="image">
            <img id="preview"> 
        </div>
        <div class="form-group">
            <label for="body">プロフィール</label>
            <textarea name="profile" id="body" class="form-control" rows="5" placeholder="プロフィールを入力してください">{{ Auth::user()->profile }}</textarea>
        </div>
            <input type="submit" value="編集" class="btn button-004-1">
            <input type="reset" value="キャンセル" class="btn button-004-3" onclick='window.history.back(-1);'>
    </form>
</div>
@endsection
