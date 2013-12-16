<div style="padding: 20px 0 0 0"></div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <img src="http://placehold.it/150x450" />
        </div>
        <div class="span10">
            <table class="table table-striped">
                {section 0 $COUNT_CATEGORIES name=cat}
                    {$CAT = $CATEGORIES[$smarty.section.cat.index]}
                    {$i = $smarty.section.cat.iteration}
                    <tr>
                        <td>{$CAT.name}</td>
                        <td>{$CAT.id}</td>
                    </tr>
                {/section}
            </table>
        </div>
    </div>
</div>