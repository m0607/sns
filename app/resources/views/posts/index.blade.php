<!-- 新規投稿一覧画面 -->

@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
      <div class="col-8">
        <div class="input-daterange input-group" id="datepicker">
          <div class="input-group-prepend">
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
        </form>
        </div>
      </div>
    </div>
</div>
@endsection