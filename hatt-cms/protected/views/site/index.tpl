<div style="padding: 20px 0 0 0"></div>
<table cellspacing="0" cellpadding="0" border="0" style="width: 100%;">
<tr>
	<td id="sidebar">
			<div class="one_s">
			<p class="name_s">Sidebar</p>
				<ul>
					<li>Sidebar</li>
				<ul>
			</div>
		
			<div>
			<p class="name_s">Sidebar 2</p>
				<ul>
					<li>Sidebar</li>
				<ul>
			</div>
	</td>
	<td id="content">
		<div class="categories">
			<div class="c_name">Name</div>
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
	</td>
<tr>
</table>