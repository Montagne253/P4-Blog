<?php
use OpenClassrooms\Blog\Model;

require_once('model/Manager.php');

class ProfilManager extends Manager
{

    public function add(Profil $profil)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO editeur (pseudo, email, pass, date_creation) VALUES(?, ?, ?, NOW())');
            
            $req->execute(array(
                $profil->pseudo(),
                $profil->email(),
                $profil->pass(),
                $profil->dateCreation()
            ));
    }

    public function get($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM editeur WHERE id = ?');
        $req->execute(array(
            $id
        ));
        $data = $req->fetch();
        
        return new Profil($data);
           
    }

    public function getPseudo($pseudo) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM editeur WHERE pseudo = ?');
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
        $db = $this->dbConnect();
    
        $req = $db->prepare('UPDATE editeur SET pseudo = :pseudo, email = :email, pass = :pass, date_modification = NOW() WHERE id = :id');
        $req->execute(array(
           "pseudo" => $profil->pseudo(),
           "email" => $profil->email(),
           "pass" => $profil->pass(),
           "id" => $profil->id()
        ));
    }
}