<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <img src="http://placehold.it/150x450" />
        </div>
        <div class="span10">
            <div class="categories">
                {**
                 * У смарти есть свой внутренний счетчик.
                 * Для следующего цикла это может выглядеть как {$smarty.section.cat.iteration}
                 *}
                {section 0 $COUNT_CATEGORIES name=cat}
                    {$CAT = $CATEGORIES[$smarty.section.cat.index]}
                    {$i = $smarty.section.cat.iteration}
                    <div class="row-fluid show-grid">
                        <div class="span4">{$CAT.name}</div>
                        <div class="span5">{$CAT.id}</div>
                    </div>
                {/section}
            </div>
        </div>
    </div>
</div>