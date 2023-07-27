<!-- bootstrap-datepickerを読み込む -->
<link rel="stylesheet" type="text/css" href="../bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.min.css">
<script type="text/javascript" src="../bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../bootstrap-datepicker-1.6.4-dist/locales/bootstrap-datepicker.ja.min.js"></script>

<div class="container">
    <div class="row mt-4">
        <div class="col-2">
            <label>日付：</label>
        </div>
        <div class="col-5">

            <!-- ここにカレンダー表示用のテキストボックスを追加 -->
            <input type="text" class="form-control" id="date_sample">

        </div>
    </div>
</div>

<!-- bootstrap-datepickerのjavascriptコード -->
<script>
    $('#date_sample').datepicker();
</script>