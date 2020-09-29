<?php


namespace App\Presenters;


use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use app\Model\connDatabase;

class DetailpagePresenter extends Presenter
{

    private $database;
    private $id;


    public function __construct(connDatabase $database)
    {
        $this->database = $database;
    }

    public function beforeRender()
    {
       $this->template->title = "Detail jídla";

    }

    protected function createComponentDetailForm()
    {
        $vypis = $this->database->db_gen_aler()->fetchPairs('id','nazev');
        $form = new Form;
        $form->addText('nazev');
        $form->addText('datum');


        $form->addCheckbox('status');
        $form->addCheckboxList('alergeny','alergeny',$vypis);

        $form->addSubmit('save')->onClick[] = [$this, 'detailFormSucceeded'];


        return $form;

    }


    public function detailFormSucceeded($form, $values)
    {
        $varDatum = new \DateTime($values->datum);
        $formatedDatum = $varDatum->format('Y-m-d');

        $this->id = $this->getParameter('id');
        if ($values->status == true)
        {
            $status = 1;
        }
        elseif ($values->status == false)
        {
            $status = 0;
        }

       $this->database->updateDbJidelnicek($this->id, $values->nazev, $formatedDatum, $status);


        $db_gen_alergeny = $this->database->db_gen_aler();
        $this->database->deleteRowsDbAlergeny($this->id);

        if($values->alergeny)
        {
            foreach ($db_gen_alergeny as $item)
            {
                foreach ($values->alergeny as $ite)
                {
                    if ($item->id == $ite)
                    {
                        $this->database->insertDbAlergeny($this->id, $item->nazev);
                    }
                }
            }
        }
        $this->redirect('Homepage:default');

    }

    public function renderDetail($id)
    {

        $jidlo = $this->database->db_jidel()->where('id',$id)->fetch();
        $alergeny = $this->database->db_alergeny()->where('id_menu',$id)->fetchAll();
        $gen_alergeny = $this->database->db_gen_aler();

        $this->template->jidlo = $jidlo;
        $this->template->alergeny = $alergeny;
        $this->template->gen_alergeny = $gen_alergeny;



    }

}