<?php


namespace app\Model;

use Nette;
use Nette\Database\Context;

class connDatabase
{
    use Nette\SmartObject;

    private $database;


    Public function __construct(Context $database)
    {
        $this->database = $database;
    }

    public function db_jidel()
    {
        return $this->database->table('jidelnicek');
    }
//    public function db_aler()
//    {
//        return $this->database->table('alergeny');
//    }
    public function db_gen_aler()
    {
        return $this->database->table('gen_alergeny');
    }
    public function db_jidelnicek($limit, $offset)
    {
        return $this->database->query('SELECT * FROM jidelnicek ORDER BY datum DESC LIMIT ? OFFSET ?', $limit, $offset);
    }
    public function pocetJidel()
    {
        return $this->database->fetchField('SELECT COUNT(*) FROM jidelnicek');
    }
    public function db_alergeny()
    {
        return $this->database->table('alergeny');
    }
    public function pocetGenAlergenu()
    {
        return $this->database->fetchField('SELECT COUNT(*) FROM gen_alergeny');
    }

    public function db_gen_alergeny($limit, $offset)
    {
        return $this->database->query('SELECT * FROM gen_alergeny LIMIT ? OFFSET ?', $limit, $offset);
    }

    public function db_users()
    {
        return $this->database->table('users');
    }

    public function registrace($email, $password)
    {
        $this->database->query('INSERT INTO users', [ // tady můžeme otazník vynechat
            'email' => $email,
            'password' => $password,
            'status'=> 0
        ]);
    }
    public function potrvrzeniRegistrace($password)
    {
        $this->database->query('UPDATE users SET', [
            'status' => 1,
        ], 'WHERE password = ?', $password);
    }
    public function updateDbJidelnicek($id, $nazev, $datum, $status)
    {
        $this->database->query('UPDATE jidelnicek SET', [
            'nazev' => $nazev,
            'datum' => $datum,
            'status' => $status,
            ],'WHERE id = ?', $id);
    }
    public function insertDbAlergeny($id_menu, $nazev)
    {
        $this->database->query('INSERT INTO alergeny',[
            'id_menu' => $id_menu,
            'nazev' => $nazev,
        ]);
    }
    public function deleteRowsDbAlergeny($id_menu)
    {
        $this->database->query('DELETE FROM alergeny',[],'WHERE id_menu = ?', $id_menu);
    }
    public function deleteRowsDbAlergenyByName($nazev)
    {
        $this->database->query('DELETE FROM alergeny', [],'WHERE nazev = ', $nazev);
    }
    public function updateDbGenAlergeny($id, $nazev, $vyskyt)
    {
        $this->database->query('UPDATE gen_alergeny SET',['nazev' => $nazev, 'vyskyt' => $vyskyt,],'WHERE id = ?', $id);
    }
    public function deleteRowDbJidelnicek($id)
    {
        $this->database->query('DELETE FROM jidelnicek', [],'WHERE id = ?', $id);
    }
    public function deleteRowDbGenAlergeny($id)
    {
        $this->database->query('DELETE FROM gen_alergeny', [],'WHERE id = ?', $id);
    }
    public function insertIntoDbJidelnicek($nazev, $datum, $status)
    {
        $this->database->query('INSERT INTO jidelnicek',[
            'nazev' => $nazev,
            'datum' => $datum,
            'status'=> $status,
        ]);
    }
    public function insertIntoDbGenAlergeny($nazev, $vyskyt)
    {
        $this->database->query('INSERT INTO gen_alergeny', ['nazev' =>$nazev, 'vyskyt' => $vyskyt]);
    }
}