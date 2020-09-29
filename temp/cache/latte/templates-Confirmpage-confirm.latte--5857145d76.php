<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/Confirmpage/confirm.latte

use Latte\Runtime as LR;

class Template5857145d76 extends Latte\Runtime\Template
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

        <img class="border-0 rounded mx-auto d-block" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 5 */ ?>/img/congra.jpg">
         </br>
        </br>
        </br>
        <h1 class="h1">
            <p class="text-center">Registrace dokončena</p>
        </h1>
    </div>

<?php
	}

}
