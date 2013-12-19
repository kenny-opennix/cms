<div class="row">
    <div class="span3">
        {include file="./_left_menu.tpl" active="show"}
    </div>
    <div class="span9">
        <table class="table">
            <tr>
                <th>Login</th>
                <th>User level</th>
                <th>Avatar</th>
                <th>Birthday</th>
            </tr>
            {foreach from=$USERS item=USER}
                <tr>
                    <td><a href="/profile/view/{$USER.id}">{$USER.login}</a></td>
                    <td>{$USER.level}</td>
                    <td>{$USER.avatar}</td>
                    <td>{$USER.birthday}</td>
                </tr>
            {/foreach}
        </table>
    </div>
</div>