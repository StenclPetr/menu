<?php


namespace App\Presenters;


use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use app\Model\connDatabase;

class AddAlergenpagePresenter extends Presenter
{
    private $database;

    public function __construct(connDatabase $database)
    {
        $this->database = $database;
    }
    public function beforeRender()
    {
        $this->template->title = "Přidat alergen";
    }

    protected function createComponentAddAForm()
    {
        $form = new Form;
        $form->addText('nazev')->setRequired('Vložte název alergenu.');
        $form->addText('vyskyt');
        $form->addSubmit('save')->onClick[] = [$this, 'detailFormSucceeded'];

        return $form;
    }
    public function detailFormSucceeded($form, $values)
    {
        $duplicitniJidlo =  $this->database->db_gen_aler()->where('nazev',$values->nazev)->fetch();

        if (!$duplicitniJidlo)
        {
            $this->database->insertIntoDbGenAlergeny($values->nazev, $values->vyskyt);


            $this->redirect('Alergenypage:alergeny');
        }
        elseif ($duplicitniJidlo)
        {
            $this->template->text = $this->flashMessage('Alergen se v seznamu již nachází.','error');
            $this->forward('AddAlergenpage:addA');
        }

    }
}