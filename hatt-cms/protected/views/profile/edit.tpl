<div style="padding: 10px 0 0 0"></div>
<div class="row">
    <div class="span2" style="text-align: center;">
        <img src="http://dummyimage.com/150x300/000/fff"/>
    </div>
    <div class="span10">
        <table class="table table-striped">
            <tr>
                <td style="width: 50%">Логин *</td>
                <td><input type="text" value="{$model.login}" name="login"></td>
            </tr>
            <tr>
                <td>Email *</td>
                <td><input type="text" value="{$model.email}" name="email"></td>
            </tr>
            <tr>
                <td>Пароль *</td>
                <td><input type="password" value="" name="pass"></td>
            </tr>
            <tr>
                <td>Повторите пароль *</td>
                <td><input type="password" value="" name="pass"></td>
            </tr>
            <tr>
                <td>Пол</td>
                <td>
                    <select name="gender">
                        <option value="0"{if $model.gender == 0} selected{/if}>Не указано</option>
                        <option value="1"{if $model.gender == 1} selected{/if}>Мужской</option>
                        <option value="2"{if $model.gender == 2} selected{/if}>Женский</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Дата рождения</td>
                <td></td>
            </tr>
        </table>
    </div>
</div>