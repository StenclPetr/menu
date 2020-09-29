<?php


namespace App\Presenters;


use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use app\Model\connDatabase;

class DetailApagePresenter extends Presenter
{
    private $database;
    private $id;

    public function __construct(connDatabase $database)
    {
        $this->database = $database;
    }
    public function beforeRender()
    {
        $this->template->title = 'Detail alergenu';
    }
    protected function createComponentDetailForm()
    {
        $form = new Form;
        $form->addText('nazev');
        $form->addText('vyskyt');
        $form->addSubmit('save')->onClick[] = [$this, 'detailFormSucceeded'];

        return $form;
    }
    public function detailFormSucceeded($form, $values)
    {
        $this->id = $this->getParameter('id');
        $this->database->updateDbGenAlergeny($this->id, $values->nazev, $values->vyskyt);
        $this->redirect('Alergenypage:alergeny');
    }
    public function renderDetailA($id)
    {
        $this->template->gen_alergeny = $this->database->db_gen_aler()->where('id',$id)->fetch();
    }

}