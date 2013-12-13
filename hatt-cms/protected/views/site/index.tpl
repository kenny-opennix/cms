<div class="row">
    <div class="span3"></div>
    <div class="span9">
            {foreach from=$CATEGORIES item=CAT}
                <div class="row-fluid show-grid">
                    <div class="span4">{$CAT.name}</div>
                    <div class="span5">{$CAT.id}</div>
                </div>
            {/foreach}
    </div>
</div>