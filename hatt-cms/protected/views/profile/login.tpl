<div class="container-fluid">
    <div class="row-fluid">
        <fieldset>
            <legend>Вход</legend>
            <div class="span2">
                <img src="http://dummyimage.com/150/ff00ff/0011ff.png&text=%D0%A0%D0%B5%D0%BA%D0%BB%D0%B0%D0%BC%D0%B0" />
            </div>
            <div class="span4">
                <form method="post" enctype="application/x-www-form-urlencoded">
                    <label>
                        Введите логин:<br />
                        <input type="text" name="login" value="{if isset($login)}{$login}{/if}"/>
                    </label>
                    <label>
                        Введите пароль:<br />
                        <input type="password" name="pass"/>
                    </label>
                    <label>
                        <input type="submit" class="btn btn-primary"/>
                    </label>
                </form>
            </div>
            <div class="span6"></div>
        </fieldset>
    </div>
</div>