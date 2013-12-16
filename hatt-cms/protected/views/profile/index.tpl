<table class="table table-striped">
    <tr>
        <th>Действия: </th>
        <th><a href="/profile/edit">Редактировать</a> &nbsp; <a href="/profile/logout">Выход</a> </th>
    </tr>
    <tr>
        <td>Ваш ID в системе:</td>
        <td>{$user_info.id}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{$user_info.email}</td>
    </tr>
    <tr>
        <td>Дата регистрации:</td>
        <td>{$user_info.reg_date}</td>
    </tr>
    <tr>
        <td>Аватар:</td>
        <td>{*{$user_info.avatar}*}
            <img src="http://dummyimage.com/100/000/fff&text=%D0%90%D0%B2%D0%B0%D1%82%D0%B0%D1%80%D0%BA%D0%B0"/></td>
    </tr>
    <tr>
        <td>Пол:</td>
        <td>
            {if $user_info.gender == 0}
                Не указано
            {elseif $user_info.gender == 1}
                Мужской
            {else}
                Женский
            {/if}
        </td>
    </tr>
</table>