<!-- 管理者ページ -->
@extends('layouts.app')
 
@section('content')


<h5>管理者ページ</h5>
    <a href="{{ route('admin.serch') }}">
        <input type="submit" name="admin" value="ユーザー検索" class="btn btn-primary"> 
    </a>
    <a href="{{ route('admin.post') }}">
        <input type="submit" name="admin" value="投稿検索" class="btn btn-primary"> 
    </a>
@endsection