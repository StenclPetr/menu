<?php
// source: C:\xampp\htdocs\menu\app\presenters/templates/Detailpage/detail.latte

use Latte\Runtime as LR;

class Template15b5eaa1ca extends Latte\Runtime\Template
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
		if (isset($this->params['alergen'])) trigger_error('Variable $alergen overwritten in foreach on line 38');
		if (isset($this->params['gen_alergen'])) trigger_error('Variable $gen_alergen overwritten in foreach on line 36, 55');
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
                <table class="table table-responsive-lg">
                    <tr>
                        <td>
                            <div class="col">
                                <div class="form-group">
                                    <label<?php
		$_input = end($this->global->formsStack)["nazev"];
		echo $_input->getLabelPart()->attributes() ?>>Název</label>
                                    <input class="form-control" value="<?php echo LR\Filters::escapeHtmlAttr($jidlo->nazev) /* line 14 */ ?>"<?php
		$_input = end($this->global->formsStack)["nazev"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                                </div>
                                <div class="form-group">
                                    <label<?php
		$_input = end($this->global->formsStack)["datum"];
		echo $_input->getLabelPart()->attributes() ?>>Datum</label>
                                    <input id="datum" class="form-control" value="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->date, $jidlo->datum, 'j.m.Y')) /* line 18 */ ?>"<?php
		$_input = end($this->global->formsStack)["datum"];
		echo $_input->getControlPart()->addAttributes(array (
		'id' => NULL,
		'class' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                                </div>
                                <div class="form-group form-check">
<?php
		if ($jidlo->status == 1) {
			?>                                    <input type="checkbox" class="form-check-input" checked="checked" id="statusCheck"<?php
			$_input = end($this->global->formsStack)["status"];
			echo $_input->getControlPart()->addAttributes(array (
			'type' => NULL,
			'class' => NULL,
			'checked' => NULL,
			'id' => NULL,
			))->attributes() ?>>
                                    <label class="form-check-label" for="exampleCheck1" id="lblstatus"<?php
			$_input = end($this->global->formsStack)["status"];
			echo $_input->getLabelPart()->addAttributes(array (
			'class' => NULL,
			'for' => NULL,
			'id' => NULL,
			))->attributes() ?>>Aktivní</label>
<?php
		}
		else {
			?>                                    <input type="checkbox" class="form-check-input" id="statusCheck"<?php
			$_input = end($this->global->formsStack)["status"];
			echo $_input->getControlPart()->addAttributes(array (
			'type' => NULL,
			'class' => NULL,
			'id' => NULL,
			))->attributes() ?>>
                                    <label class="form-check-label" for="exampleCheck1" id="lblstatus"<?php
			$_input = end($this->global->formsStack)["status"];
			echo $_input->getLabelPart()->addAttributes(array (
			'class' => NULL,
			'for' => NULL,
			'id' => NULL,
			))->attributes() ?>>Neaktivní</label>
<?php
		}
?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col">
                                <div class="form-group form-check">
<?php
		$zapsano=NULL;
		if ($alergeny) {
			$iterations = 0;
			foreach ($gen_alergeny as $gen_alergen) {
				$zapsano = 0;
				$iterations = 0;
				foreach ($alergeny as $alergen) {
					if ($gen_alergen->nazev == $alergen->nazev) {
?>
                                                    <div class="input-group mb-3">
                                                        <input type="checkbox" class="form-check-input" checked<?php
						$_input = end($this->global->formsStack)["alergeny"];
						echo $_input->getControlPart($gen_alergen->id)->addAttributes(array (
						'type' => NULL,
						'class' => NULL,
						'checked' => NULL,
						))->attributes() ?>>
                                                        <label aria-label="Text input with checkbox" class="form-check-label" for="exampleCheck1"<?php
						$_input = end($this->global->formsStack)["alergeny"];
						echo $_input->getLabelPart()->addAttributes(array (
						'aria-label' => NULL,
						'class' => NULL,
						'for' => NULL,
						))->attributes() ?>><?php echo LR\Filters::escapeHtmlText($alergen->nazev) /* line 42 */ ?></label>
                                                    </div>
<?php
						$zapsano = 1;
					}
					$iterations++;
				}
				if ($zapsano == 0) {
?>
                                            <div class="input-group mb-3">
                                                <input type="checkbox" class="form-check-input"<?php
					$_input = end($this->global->formsStack)["alergeny"];
					echo $_input->getControlPart($gen_alergen->id)->addAttributes(array (
					'type' => NULL,
					'class' => NULL,
					))->attributes() ?>>
                                                <label aria-label="Text input with checkbox" class="form-check-label" for="exampleCheck1"<?php
					$_input = end($this->global->formsStack)["alergeny"];
					echo $_input->getLabelPart()->addAttributes(array (
					'aria-label' => NULL,
					'class' => NULL,
					'for' => NULL,
					))->attributes() ?>><?php echo LR\Filters::escapeHtmlText($gen_alergen->nazev) /* line 50 */ ?></label>
                                            </div>
<?php
				}
				$iterations++;
			}
		}
		elseif (!$alergeny) {
			$iterations = 0;
			foreach ($gen_alergeny as $gen_alergen) {
?>
                                            <div class="input-group mb-3">
                                                <input type="checkbox" class="form-check-input"<?php
				$_input = end($this->global->formsStack)["alergeny"];
				echo $_input->getControlPart($gen_alergen->id)->addAttributes(array (
				'type' => NULL,
				'class' => NULL,
				))->attributes() ?>>
                                                <label aria-label="Text input with checkbox" class="form-check-label" for="exampleCheck1"<?php
				$_input = end($this->global->formsStack)["alergeny"];
				echo $_input->getLabelPart()->addAttributes(array (
				'aria-label' => NULL,
				'class' => NULL,
				'for' => NULL,
				))->attributes() ?>><?php echo LR\Filters::escapeHtmlText($gen_alergen->nazev) /* line 58 */ ?></label>
                                            </div>
<?php
				$iterations++;
			}
		}
?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            <button type="submit" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["save"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>Uložit</button>
                <a class="btn btn-primary text-white"  href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Zrušit</a>
            </div>

<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>        </form>

    <script>

        $( "#statusCheck" ).click(function() {
            if($(this).prop("checked") == true) {
                $( "#lblstatus" ).text("Aktivní");
            }
            else if($(this).prop("checked") == false) {
                $( "#lblstatus" ).text("Neaktivní");
            }
        });

        // $(function() {
        //     $( "#dialog" ).dialog();
        // });
        $(function() {
            $( "#datum" ).datepicker({dateFormat: "dd.mm.yy"});
        });

    </script>

<?php
	}

}
