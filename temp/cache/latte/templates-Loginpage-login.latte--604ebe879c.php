<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/Loginpage/login.latte

use Latte\Runtime as LR;

class Template604ebe879c extends Latte\Runtime\Template
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


    <div class="container">
<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["loginForm"];
		?>        <form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), false) ?>>

            <div class="form-group">
                <label<?php
		$_input = end($this->global->formsStack)["email"];
		echo $_input->getLabelPart()->attributes() ?>>Uživatelský e-mail</label>
                <input class="form-control" placeholder="Vložte e-mail"<?php
		$_input = end($this->global->formsStack)["email"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
            </div>
            <div class="form-group">
                <label<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getLabelPart()->attributes() ?>>Heslo</label>
                <input id="pass" class="form-control" placeholder="Heslo"<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getControlPart()->addAttributes(array (
		'id' => NULL,
		'class' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
            </div>

            <button type="submit" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["send"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>Přihlášení</button>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>        </form>

    </div>
    <script>

    </script>

<?php
	}

}
