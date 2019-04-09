<?php

class BilletManager 
{
    private $_db;

    public function __construct() 
    {
        try
        {
            $this->_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'Dj253kolo932018');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function add(Billet $billet)
    {
        $req = $this->_db->prepare('INSERT INTO billet (author, title, content, date_creation) VALUES(?, ?, ?, NOW())');
            
            $req->execute(array(
                $billet->author(),
                $billet->title(),
                $billet->content()
            ));
    }

    public function get($id) {
        $req = $this->_db->prepare('SELECT id, author, title, content, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification FROM billet WHERE id = ?');
        $req->execute(array(
            $id
        ));
        $data = $req->fetch();
      
        return new Billet($data);
       
    }

    public function getList() {
        $billets = [];
    
        $req = $this->_db->query('SELECT id, author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC LIMIt 0, 2');
        while ($data = $req->fetch()) {
            $billets[] = new Billet($data);
        }
        return $billets;
        
    }

    public function getListMod() {
        $billets = [];
    
        $req = $this->_db->query('SELECT id, author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC');
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
    
        $req = $this->_db->prepare('UPDATE billet SET author = :author, title = :title, content = :content, date_modification = NOW() WHERE id = :id');
        $req->execute(array(
           "author" => $billet->author(),
           "title" => $billet->title(),
           "content" => $billet->content(),
           "id" => $billet->id()
        ));
    }
}