<?php

class ProfilManager 
{
    private $_db;

    public function __construct() 
    {
        try
        {
           $this->_db = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    }

    public function add(Profil $profil)
    {
        $req = $this->_db->prepare('INSERT INTO editeur (pseudo, email, pass, date_creation) VALUES(?, ?, ?, NOW())');
            
            $req->execute(array(
                $profil->pseudo(),
                $profil->email(),
                $profil->pass(),
                $profil->dateCreation()
            ));
    }

    public function get($id) 
    {
            $req = $this->_db->prepare('SELECT * FROM editeur WHERE id = ?');
            $req->execute(array(
                $id
            ));
            $data = $req->fetch();
          
            return new Profil($data);
           
    }

    public function getPseudo($pseudo) 
    {
        $req = $this->_db->prepare('SELECT * FROM editeur WHERE pseudo = ?');
            $req->execute(array(
                $pseudo
            ));
            $data = $req->fetch();

            if ($data) 
            {

                return new Profil($data);
            }
            else
            { 
                return false;
            }
         
            
           
    }

    public function update(Profil $profil)
    {
    
        $req = $this->_db->prepare('UPDATE editeur SET pseudo = :pseudo, email = :email, pass = :pass, date_modification = NOW() WHERE id = :id');
        $req->execute(array(
           "pseudo" => $profil->pseudo(),
           "email" => $profil->email(),
           "pass" => $profil->pass(),
           "id" => $profil->id()
        ));
    }
}