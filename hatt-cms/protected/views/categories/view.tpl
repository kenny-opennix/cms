<table class="table">
    <tr>
        <th>Имя топика</th>
        <th>Автор</th>
    </tr>
    {foreach from=$TOPICS item=t}
        <tr>
            <td><a href="/topics/view/{$t.id}">{$t.name}</a></td>
            <td><a href="#">{print_r($t.users.login)}</a></td>
        </tr>
    {/foreach}
</table>