<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/Alergenypage/alergeny.latte

use Latte\Runtime as LR;

class Templateb2dc8aefb4 extends Latte\Runtime\Template
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
		if (isset($this->params['alergen'])) trigger_error('Variable $alergen overwritten in foreach on line 13');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Název</th>
                <th scope="col">Výskyt</th>
                <th scope="col"></th>
                <th scope="col"><a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("pridat!")) ?>">Přidat</a></th>
            </tr>
            </thead>
            <tbody>
<?php
		$iterations = 0;
		foreach ($alergeny as $alergen) {
?>
                <tr>
                    <td><?php echo LR\Filters::escapeHtmlText($alergen->nazev) /* line 15 */ ?></td>
                    <td><?php echo LR\Filters::escapeHtmlText($alergen->vyskyt) /* line 16 */ ?></td>
                    <td><a class="btn btn-light btn-sm"  href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("upravit!", [$alergen->id])) ?>">Upravit</a></td>
                    <td><a class="btn btn-danger btn-sm" id="dialog" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("smazat!", [$alergen->id, $alergen->nazev])) ?>">Odstranit</a></td>
                </tr>
<?php
			$iterations++;
		}
?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h5 class="pagination justify-content-center"><?php echo LR\Filters::escapeHtmlText($paginator->getPage()) /* line 25 */ ?></h5>
    </div>
    <div class="container">
        <ul class="pagination justify-content-center">
<?php
		if (!$paginator->isFirst()) {
			?>                <li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("alergeny", [1])) ?>">První</a></li>
                <li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("alergeny", [$paginator->page-1])) ?>">Předchozí</a></li>
<?php
		}
?>


<?php
		if (!$paginator->isLast()) {
			?>                <li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("alergeny", [$paginator->page+1])) ?>">Další</a></li>
                <li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("alergeny", [$paginator->pageCount])) ?>">Poslední</a></li>
<?php
		}
?>
        </ul>
    </div>



<?php
	}

}
