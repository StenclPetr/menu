<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/DetailApage/detailA.latte

use Latte\Runtime as LR;

class Template3868a1f77e extends Latte\Runtime\Template
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
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["detailForm"];
		?>    <form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), false) ?>>
            <div class="container">
                <div class="col">
                    <div class="form-group">
                        <label<?php
		$_input = end($this->global->formsStack)["nazev"];
		echo $_input->getLabelPart()->attributes() ?>>Název</label>
                        <input class="form-control" value="<?php echo LR\Filters::escapeHtmlAttr($gen_alergeny->nazev) /* line 9 */ ?>"<?php
		$_input = end($this->global->formsStack)["nazev"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                    </div>
                    <div class="form-group">
                        <label<?php
		$_input = end($this->global->formsStack)["nazev"];
		echo $_input->getLabelPart()->attributes() ?>>Výskyt</label>
                        <input class="form-control" value="<?php echo LR\Filters::escapeHtmlAttr($gen_alergeny->vyskyt) /* line 13 */ ?>"<?php
		$_input = end($this->global->formsStack)["vyskyt"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                    </div>

                </div>
            <button type="submit" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["save"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>Uložit</button>
                <a class="btn btn-primary text-white"  href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Alergenypage:alergeny")) ?>">Zrušit</a>
            </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>        </form>

    <script>


    </script>

<?php
	}

}
