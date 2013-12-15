<div class="row">
    <div class="span3">
        Left columns
    </div>
    <div class="span9">
        {section 0 $CATEGORIES_COUNT name='categories'}
            {$CAT = $CATEGORIES[$smarty.section.categories.index]}
            <div class="row">
                <div class="span9">
                    {$CAT.name}
                </div>
            </div>
        {/section}
    </div>
</div>