<div class="row">
    <div class="span3">
        {include file="./_left_menu.tpl" active="team"}
    </div>
    <div class="span9">
        <table class="table">
            {foreach from=$GROUPS item=GROUP}
                <tr>
                    <td><a href="/members/show/{$GROUP.id}">{$GROUP.name}</a></td>
                </tr>
            {/foreach}
        </table>
    </div>
</div>