<?php


namespace app\Model;

use Nette;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Nette\Mail\IMailer;

class mailService
{
    use Nette\SmartObject;

    protected $mail;
    public $mailer;

    private $odesilatel;
    private $jmenoOdesilatele;
    private $predmet;
    private $adresat;
    private $zprava;

    public function __construct()
    {
        $this->mail = new Message();
        $this->mailer = new SendmailMailer();
    }


    public function __get($name)
    {
        echo $name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function send()
    {
        $this->mail->setFrom($this->odesilatel,$this->jmenoOdesilatele)
            ->addTo($this->adresat)
            ->setSubject($this->predmet)
            ->setBody($this->zprava);

        //Nastavení

//        $mailer = new Nette\Mail\SmtpMailer([
//            'smtp'=>'true',
//            'host' => 'smtp.gmail.com', //  pokud není nastaven, použijí se hodnoty z php.ini
//            'username' => 'petr.stenclr@gmail.com',
//            'password' => 'raven3146',
//            'secure' => 'ssl',
//        ]);
        $this->mailer->send($this->mail);
    }
}
