<?php

class BilletManager 
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

    public function add(Billet $billet)
    {
        $req = $this->_db->prepare('INSERT INTO billet (auteur, titre, contenu, date_creation) VALUES(?, ?, ?, NOW())');
            
            $req->execute(array(
                $billet->auteur(),
                $billet->titre(),
                $billet->contenu()
            ));
    }

    public function get($id) {
        $req = $this->_db->prepare('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification FROM billet WHERE id = ?');
        $req->execute(array(
            $id
        ));
        $data = $req->fetch();
      
        return new Billet($data);
       
    }

    public function getList() {
        $billets = [];
    
        $req = $this->_db->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC LIMIt 0, 2');
        while ($data = $req->fetch()) {
            $billets[] = new Billet($data);
        }
        return $billets;
        
    }

    public function getListMod() {
        $billets = [];
    
        $req = $this->_db->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC');
        while ($data = $req->fetch()) {
            $billets[] = new Billet($data);
        }
        return $billets;
        
    }
    public function delete($id)
    {
        $req = $this->_db->prepare('DELETE FROM billet WHERE id = ?');
        $req->execute([
            $id
        ]);
    }

    public function update(Billet $billet)
    {
    
        $req = $this->_db->prepare('UPDATE billet SET auteur = :auteur, titre = :titre, contenu = :contenu, date_modification = NOW() WHERE id = :id');
        $req->execute(array(
           "auteur" => $billet->auteur(),
           "titre" => $billet->titre(),
           "contenu" => $billet->contenu(),
           "id" => $billet->id()
        ));
    }
}