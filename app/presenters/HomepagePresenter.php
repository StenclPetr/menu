<?php

namespace App\Presenters;


use Nette\Security\User;
use Nette\Security\Identity;
use app\Model\connDatabase;
use Nette;
use Nette\Application\UI\Form;
use Nette\Application\UI\Control;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    private $database;
    private $stav;
    private $id;
    private $form;

    public function __construct(connDatabase $database)
    {

        $this->database = $database;

    }

    public function beforeRender()
    {
        $this->stav();
        $this->template->title = "Jídelní lístek";
        $this->template->logon = $this->stav;
    }

    public function renderDefault($page = 1)
    {
        $menuCount = $this->database->pocetJidel();

        $paginator = new Nette\Utils\Paginator;

        $paginator->setItemCount($menuCount);
        $paginator->setItemsPerPage(5); // počet položek na stránce
        $paginator->setPage($page); // číslo aktuální stránky


        $menu = $this->database->db_jidelnicek($paginator->getLength(), $paginator->getOffset());
        $this->template->posts = $menu;
        $this->template->paginator = $paginator;
        $this->template->alers = $this->database->db_alergeny();
        $this->template->prom = '';

        $gen_alergeny = $this->database->db_gen_aler();

        $this->template->gen_alergeny = $gen_alergeny;
    }

    public function stav()
    {

        if ($this->user->isLoggedIn() == true)
        {
            $this->stav = "Přihlášený";

        }
        elseif ($this->user->isLoggedIn() == false)
        {
            $this->stav = 'Nepřihlášený';
        }
    }

    public function handleOdhlasit()
    {
        $this->user->logout();
    }
    public function handlePridat()
    {
        if ($this->user->isLoggedIn() == true)
        {
            $this->forward('AddJidlopage:add');

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
           $this->forward('Detailpage:detail',$id);

       }
       else
       {
           $this->forward('Registracepage:registrace');
       }

    }

    public function handleSmazat($id)
    {
        if ($this->user->isLoggedIn() == true)
        {
            $this->database->deleteRowDbJidelnicek($id);
            $this->redirect('Homepage:default');
        }
        else
        {
            $this->forward('Registracepage:registrace');
        }
    }

}
