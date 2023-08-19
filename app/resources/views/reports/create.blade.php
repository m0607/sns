<!-- 報告画面 -->
@extends('layouts.app')
@section('content')

<h1 class="d-flex justify-content-center my-3 h3">報告</h1>
<div class="d-flex justify-content-center">
        <div class="form-group">
            <p>報告内容</p>
            <form action="{{ route('reports.store') }}" method="post">  <!--()にはroutelistのname書く-->
            @csrf
                <input type="hidden" name="post_id" value="{{ $post_id }}"> <!--hidden表示しないで値渡す value値-->
                <textarea rows="8" class="form-control" name="content"></textarea>
                <div class="large-17 columns text-center">
                <button class="btn btn-primary" type="submit"value="">報告</button>
            </form>
        </div>
</div>
@endsection