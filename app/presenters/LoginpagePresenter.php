<?php


namespace App\Presenters;


use http\Exception\InvalidArgumentException;
use http\Exception\UnexpectedValueException;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use app\Model\connDatabase;
use Nette\Security\AuthenticationException;
use Nette\Security\Passwords;

class LoginpagePresenter extends Presenter
{

    private $hash;

    public function __construct()
    {

    }
    protected function createComponentLoginForm()
    {
        $form = new Form;

        $form->addPassword('password')->setRequired('Vyplňte heslo')
            ->addRule(FORM::MIN_LENGTH, 'Heslo musí mít alespoň 6 znaků',6)
            ->addRule(Form::PATTERN, 'Heslo musí obsahovat číslo.', '.*[0-9].*');

//        $form->addPassword('val_password')->setRequired('Potvrďte heslo');

        $form->addEmail('email')->setRequired('Vyplňte e-mail');
        $form->addSubmit('send');
        $form->onSuccess[]=[$this,'loginFormSucceeded'];

        return $form;
    }
    public function loginFormSucceeded(Form $form, $values)
    {
        try
        {
            $this->user->login($values->email, $values->password);
            $this->template->aaa = $this->flashMessage('Uspěšné přihlášení','succsess');

            $this->redirect('Homepage:default');
        }
        catch (AuthenticationException $e)
        {
            $mess = $e->getMessage();
            if ($mess == 'Neplatné uživatelské jméno.')
            {
                $this->template->text = $this->flashMessage($mess,'error');
            }
            elseif ($mess == 'Neplatné heslo.')
            {
                $this->template->text = $this->flashMessage($mess,'error');
            }
            elseif ($mess == 'Nepotvrzená registrace.')
            {
                $this->template->text = $this->flashMessage($mess,'error');
            }

        }

    }
    public function beforeRender()
    {
        $this->template->title = 'Přihlášení';
    }

    public function renderLogin()
    {

    }
}