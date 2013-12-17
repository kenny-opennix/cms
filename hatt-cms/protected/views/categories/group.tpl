<div style="padding: 10px 0 0 0"></div>
<div class="row">
    <div class="span3" style="text-align: center;">
        <img src="http://dummyimage.com/150x450/000/fff">
    </div>
    <div class="span9">
        <table class="table table-striped">
            {foreach from=$CATEGORIES item=CAT}
                <tr>
                    <td><a href="/categories/view/{$CAT.id}">{$CAT.name}</a></td>
                </tr>
            {/foreach}
        </table>
    </div>
</div>