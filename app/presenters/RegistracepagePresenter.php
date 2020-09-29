<?php


namespace App\Presenters;

use Nette;
use Nette\Application\UI\Presenter;
use app\Model\connDatabase;
use Nette\Application\UI\Form;
use Nette\Security\Passwords;
use app\Model\mailService;


class RegistracepagePresenter extends Presenter
{

    private $database;
    private $tb_users;
    private $hash;
    private $mail;

    public function __construct(connDatabase $database, mailService $mail)
    {
        $this->database = $database;
        $this->tb_users = $this->database->db_users();
        $this->mail = $mail;
    }

    protected function createComponentRegistraceForm()
    {
        $form = new Form;
        $form->addPassword('password')->setRequired('Vyplňte heslo')
            ->addRule(FORM::MIN_LENGTH, 'Heslo musí mít alespoň 6 znaků',6)
            ->addRule(Form::PATTERN, 'Heslo musí obsahovat číslo.', '.*[0-9].*');

        $form->addPassword('val_password')->setRequired('Potvrďte heslo');

        $form->addEmail('email')->setRequired('Vyplňte e-mail');
        $form->addSubmit('send');
        $form->onSuccess[]=[$this,'registraceFormSucceeded'];

        return $form;

    }
    public function beforeRender()
    {
        $this->template->title = 'Registrace';

    }


    public function registraceFormSucceeded(Form $form, $values)
    {
        if ($values->password == $values->val_password)
        {
            foreach ($this->tb_users as $tb_user)
            {

                if($tb_user->email == $values->email)
                {

                    $this->template->text = $this->flashMessage('Tento e-mail je již registrován.','error');

                    $this->redirect('Registracepage:registrace');
                    exit();
                }

            }
        }
        elseif ($values->password <> $values->val_password)
        {

            $this->template->text = $this->flashMessage('Heslo neodpovídá.','error');

            $this->redirect('Registracepage:registrace');
            exit();
        }


        //hash hesla
        $this->hash($values->password);
        //odeslání registračního mailu
        $this->mail->odesilatel = 'admin@jidelnilistek.com';
        $this->mail->jmenoOdesilatele = 'Admin';
        $this->mail->adresat = $values->email;
        $this->mail->predmet = 'Potvrzení registrace';
        $this->mail->zprava = "Děkujeme za Váši registraci. Potvrďte prosím na adrese " . "Http://localhost" . $this->link('Confirmpage:confirm', array('confirm'=>$this->hash)) ;
        $this->mail->send();

        $this->database->registrace($values->email, $this->hash);


        $this->template->text = $this->flashMessage('Registrační e-mail byl odeslán.','success');

        $this->forward('Homepage:');
    }

    private function hash($pass)
    {
        $this->hash = Passwords::hash($pass);
    }


}