<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/AddAlergenpage/addA.latte

use Latte\Runtime as LR;

class Template7c3c9a2bc8 extends Latte\Runtime\Template
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
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["addAForm"];
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
                        <input class="form-control" placeholder="Vyplňte jméno alergenu"<?php
		$_input = end($this->global->formsStack)["nazev"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
                    </div>
                    <div class="form-group">
                        <label<?php
		$_input = end($this->global->formsStack)["nazev"];
		echo $_input->getLabelPart()->attributes() ?>>Výskyt</label>
                        <input class="form-control" placeholder="Výskyt"<?php
		$_input = end($this->global->formsStack)["vyskyt"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'placeholder' => NULL,
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
