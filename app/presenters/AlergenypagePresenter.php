<?php


namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use app\Model\connDatabase;

class AlergenypagePresenter extends Presenter
{
    private $database;

    public function __construct(connDatabase $database)
    {
        $this->database = $database;
    }

    public function renderAlergeny($page = 1)
    {
        $this->template->title = 'Alergeny';


        $menuCount = $this->database->pocetGenAlergenu();

        $paginator = new Nette\Utils\Paginator;
        $paginator->setItemCount($menuCount);
        $paginator->setItemsPerPage(5);
        $paginator->setPage($page);

        $menu = $this->database->db_gen_alergeny($paginator->getLength(), $paginator->getOffset());
        $this->template->alergeny = $menu;
        $this->template->paginator = $paginator;
    }




    public function handlePridat()
    {
        if ($this->user->isLoggedIn() == true)
        {
            $this->forward('AddAlergenpage:addA');

        }
        else
        {
            $this->forward('Registracepage:registrace');
        }
    }
    public function handleUpravit($id)
    {
        if ($this->user->isLoggedIn() == true)
        {
            $this->forward('DetailApage:detailA',$id);

        }
        else
        {
            $this->forward('Registracepage:registrace');
        }
    }
    public function handleSmazat($id, $nazev)
    {
        if ($this->user->isLoggedIn() == true)
        {
            $this->database->deleteRowDbGenAlergeny($id);
            $this->database->deleteRowsDbAlergenyByName($nazev);
            $this->forward('Alergenypage:alergeny');
        }
        else
        {
            $this->forward('Registracepage:registrace');
        }
    }

}