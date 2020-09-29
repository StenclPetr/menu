<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template81bd4d2ac8 extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'title' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

    <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */ ?>/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 12 */ ?>/js/jquery-ui.min.js"></script>
    <link href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */ ?>/css/jquery-ui.theme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */ ?>/css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>

<body>

        <nav class="container navbar navbar-expand-lg navbar-light bg-light">

            <nav class="container navbar-brand">
                <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 28 */ ?>/img/logo menu.jpg" width="50" height="70" class="d-inline-block align-top" alt="">
<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('title', get_defined_vars());
?>
                <span  class="nav-item">
                </span>
            </nav>
        </nav>

        <nav class="container navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Domů</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Alergenypage:alergeny")) ?>">Alergeny</a>
                    </li>


                </ul>
            </div>
            <span class="nav-item">
                <a class="btn btn-outline-light btn-sm active" role="button" aria-pressed="true" href="<?php
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Registracepage:registrace")) ?>">Registrace</a>
            </span>

            <span class="nav-item">
                <a class="btn btn-outline-light btn-sm active" role="button" aria-pressed="true" href="<?php
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Loginpage:login")) ?>">Přihlášení</a>
            </span>

        </nav>
        </br>
		<div class="container ">
			<h1> </h1>
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>			<div <?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 65 */ ?></div>
<?php
			$iterations++;
		}
?>
			<h1> </h1>
		</div>

        </br>

        <script>

        </script>

<?php
		$this->renderBlock('content', $this->params, 'html');
?>




<?php
		$this->renderBlock('scripts', get_defined_vars());
?>

</body>

</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 65');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockTitle($_args)
	{
		extract($_args);
		?>                <h1 class="container card-title col"><?php echo LR\Filters::escapeHtmlText($title) /* line 29 */ ?></h1>
<?php
	}


	function blockScripts($_args)
	{
		
	}

}
