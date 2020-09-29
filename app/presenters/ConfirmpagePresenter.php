<?php


namespace App\Presenters;

use Nette;
use Nette\Application\UI\Presenter;
use Nette\Http\Request;
use app\Model\connDatabase;


class ConfirmpagePresenter extends Presenter
{

    private $pozadavek;
    private $database;


    public function __construct(Request $request, connDatabase $database)
    {
        $this->pozadavek = $request;
        $this->database = $database;
        $this->database->potrvrzeniRegistrace($this->pozadavek->getQuery('confirm'));
    }

    public function beforeRender()
    {
        $this->template->title = 'Potvrzení registrace';
    }

    public function renderConfirm()
    {

    }
}