<form method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend>Вход</legend>
        <label>
            Введите логин:
            <input type="text" name="login" value="{if isset($login)}{$login}{/if}"/>
        </label>
        <label>
            Введите пароль:
            <input type="password" name="pass"/>
        </label>
        <label>
            <input type="submit" class="btn btn-primary"/>
        </label>
    </fieldset>
</form>