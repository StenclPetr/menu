<?php


namespace App\Presenters;


use app\Model\connDatabase;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

class AddJidlopagePresenter extends Presenter
{
    private $database;
    private $id;


    public function __construct(connDatabase $database)
    {
        $this->database = $database;
    }

    public function beforeRender()
    {
        $this->template->title = "Přidat jídlo";

    }

    protected function createComponentDetailForm()
    {
        $vypis = $this->database->db_gen_aler()->fetchPairs('id','nazev');

        $form = new Form;
        $form->addText('nazev')->setRequired('Vyplňte název.');
        $form->addText('datum')->setRequired('Vyplňte datum');


        $form->addCheckbox('status');
        $form->addCheckboxList('alergeny','alergeny',$vypis);

        $form->addSubmit('save')->onClick[] = [$this, 'detailFormSucceeded'];


        return $form;

    }


    public function detailFormSucceeded($form, $values)
    {
        $varDatum = new \DateTime($values->datum);

        $formatedDatum = $varDatum->format('Y-m-d');


        if ($values->status == true)
        {
            $status = 1;
        }
        elseif ($values->status == false)
        {
            $status = 0;
        }

        $duplicitniJidlo =  $this->database->db_jidel()->where('nazev',$values->nazev)->fetch();

        if (!$duplicitniJidlo)
        {
            $this->database->insertIntoDbJidelnicek($values->nazev, $formatedDatum, $status);
            $ziskaneId = $this->database->db_jidel()->where('nazev',$values->nazev)->fetch();

            if ($values->alergeny)
            {
                $db_gen_alergeny = $this->database->db_gen_aler();

                foreach ($db_gen_alergeny as $item) {
                    foreach ($values->alergeny as $ite) {
                        if ($item->id == $ite) {
                            $this->database->insertDbAlergeny($ziskaneId->id, $item->nazev);
                        }
                    }
                }
            }

            $this->redirect('Homepage:default');
        }
        elseif ($duplicitniJidlo)
        {
            $this->template->text = $this->flashMessage('Jídlo se již v jídelníčku nachází.','error');
            $this->forward('AddJidlopage:add');
        }

    }


    public function renderAdd()
    {
        $gen_alergeny = $this->database->db_gen_aler();

        $this->template->gen_alergeny = $gen_alergeny;



    }
}