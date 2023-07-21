<html>
    <body>
        <div class="col-4">
        <h1 class="mb-4">違反報告フォーム</h1>
        <div class="form-group">
        <div class="alert alert-danger" v-if="errors.id" v-text="errors.id"></div>
        <div class="alert alert-danger" v-if="errors.target" v-text="errors.target"></div>

        <div class="form-group">
            <label>報告内容</label>
            <textarea rows="7" class="form-control" v-model="params.comment"></textarea>
            <div class="alert alert-danger" v-if="errors.comment" v-text="errors.comment"></div>
        </div>

    </body>
</html>