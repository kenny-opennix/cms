<div class="row">
    <div class="span3"></div>
    <div class="span9">
        <form method="post" action="/topics/create" id="topics-form">
            {*    <div>
                    <label for="Topics_users_id">Users</label>
                    <input type="text" id="Topics_users_id" name="users_id" maxlength="11" size="11">
                </div>*}
            <div>
                <label for="Topics_categories">Категория: <span class="required">*</span></label>
                {$CATEGORIES_HTML}
            </div>
            <div>
                <label for="Topics_name">Название раздачи: <span class="required">*</span></label>
                <input type="text" value="" id="Topics_name" name="name" maxlength="255">
            </div>
            <div>
                <label class="required" for="Topics_text">Описание: <span class="required">*</span></label>
                <textarea id="Topics_text" name="text" rows="6"></textarea>
            </div>
            <div>
                <label class="required" for="Topics_attachment">Торрент файл: <span class="required">*</span></label>
                <input type="file" value="" id="Topics_attachment" name="attachment">
            </div>
            <div>
                <input type="submit" value="Отправить" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>