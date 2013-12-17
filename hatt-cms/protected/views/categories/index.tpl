<div style="padding: 10px 0 0 0"></div>
<div class="row">
    <div class="span3" style="text-align: center;">
        <img src="http://dummyimage.com/150x450/000/fff">
    </div>
    <div class="span9">
        {foreach from=$CATEGORIES item=CAT}
            {if !count($CAT.child)}
                {continue}
            {/if}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><a href="/categories/group/{$CAT.item.id}">{$CAT.item.name}</a></th>
                </tr>
                </thead>
                <tbody>
                {foreach from=$CAT.child item=cat}
                    <tr>
                        <td><a href="/categories/view/{$cat.id}">{$cat.name}</a></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        {/foreach}
    </div>
</div>