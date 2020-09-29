<?php


namespace app\Model;

use Nette;
use app\Model\connDatabase;
use Nette\Security\Passwords;


class autentikator implements Nette\Security\IAuthenticator
{

    private $database;
    private $hash;

    public function __construct(connDatabase $database)
    {
        $this->database = $database;
    }
    public function authenticate(array $credentials)
    {
        list($email, $password) = $credentials;
        $row = $this->database->db_users()
            ->where('email', $email)->fetch();

        if (!$row) {
            throw new Nette\Security\AuthenticationException('Neplatné uživatelské jméno.');
        }
        else
        {
            if ($row->status == 1)
            {
                $this->hash = Passwords::hash($password);
                if (!Nette\Security\Passwords::verify($password, $this->hash)) {
                    throw new Nette\Security\AuthenticationException('Neplatné heslo.');
                }
                return new Nette\Security\Identity($row->id, $row->status, ['email' => $row->email]);
            } elseif ($row->status == 0) {
                if ($password != $row->password) {
                    throw new Nette\Security\AuthenticationException('Nepotvrzená registrace.');
                }

            }
        }

    }


}