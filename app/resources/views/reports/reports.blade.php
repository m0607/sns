<html>
    <body>
        <div class="col-4">
                <h1 class="my-3 h3">報告</h1>
                <div class="form-group">
                <div class="alert alert-danger" v-if="errors.id" v-text="errors.id"></div>
                <div class="alert alert-danger" v-if="errors.target" v-text="errors.target"></div>

            <div class="form-group">
                <label>報告内容</label>
                <div>
                    <textarea rows="7" class="form-control" v-model="params.comment"></textarea>
                    <div class="alert alert-danger" v-if="errors.comment" v-text="errors.comment"></div>
                </div>
            
                <div class="large-12 columns text-center">
                    <button class="button expanded" type="button">報告</button>
                </div>
            </div>
        </div>
    </body>
</html>