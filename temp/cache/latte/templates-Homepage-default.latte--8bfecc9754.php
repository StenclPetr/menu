<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template8bfecc9754 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>


<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['aler'])) trigger_error('Variable $aler overwritten in foreach on line 34');
		if (isset($this->params['post'])) trigger_error('Variable $post overwritten in foreach on line 22');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

	<div class="container">
	</div>
	<script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */ ?>www/js/jquery-3.4.1.min.js"></script>

	<div class="container">
		<table class="table table-striped table-responsive-lg">
			<thead>
			<tr>
				<th scope="col">Název</th>
				<th scope="col">Datum</th>
				<th scope="col">Status</th>
				<th scope="col">Alergeny</th>
				<th scope="col"></th>
				<th scope="col"><a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("pridat!")) ?>">Přidat</a></th>
			</tr>
			</thead>
			<tbody>
<?php
		$iterations = 0;
		foreach ($posts as $post) {
?>
			<tr>
				<td id="nazev"><?php echo LR\Filters::escapeHtmlText($post->nazev) /* line 24 */ ?></td>
				<td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $post->datum, 'j.m.Y')) /* line 25 */ ?></td>
				<td>
<?php
			if ($post->status == 1) {
?>
						<input type="checkbox" checked="checked" disabled>
<?php
			}
			elseif ($post->status == 0) {
?>
						<input type="checkbox" disabled>
<?php
			}
?>
				</td>
				<td>
<?php
			$iterations = 0;
			foreach ($alers as $aler) {
				if ($post->id == $aler->id_menu) {
					?>							<?php echo LR\Filters::escapeHtmlText($aler->nazev . ',') /* line 36 */ ?>

<?php
				}
				$iterations++;
			}
?>
				</td>

				<td><a class="btn btn-light btn-sm"  href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("upravit!", [$post->id])) ?>">Upravit</a></td>
				<td><a class="btn btn-danger btn-sm" id="dialog" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("smazat!", [$post->id])) ?>">Odstranit</a></td>

			</tr>
<?php
			$iterations++;
		}
?>
			</tbody>
		</table>
	</div>

	<div class="container">
		<h5 class="pagination justify-content-center"><?php echo LR\Filters::escapeHtmlText($paginator->getPage()) /* line 51 */ ?></h5>
	</div>
	<div class="container">


		<ul class="pagination justify-content-center">
<?php
		if (!$paginator->isFirst()) {
			?>			<li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [1])) ?>">První</a></li>
			<li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$paginator->page-1])) ?>">Předchozí</a></li>
<?php
		}
?>


<?php
		if (!$paginator->isLast()) {
			?>			<li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$paginator->page+1])) ?>">Další</a></li>
			<li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$paginator->pageCount])) ?>">Poslední</a></li>
<?php
		}
?>
		</ul>
	</div>



<script>



</script>

<?php
	}

}
