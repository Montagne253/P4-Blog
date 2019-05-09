<?php
require_once("model/Manager.php"); 

class BilletManager extends Manager
{

    public function add(Billet $billet)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO billet (author, title, content, date_creation) VALUES(?, ?, ?, NOW())');
            
            $req->execute(array(
                $billet->author(),
                $billet->title(),
                $billet->content()
            ));
    }

    public function get($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, title, content, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr FROM billet WHERE id = ?');
        $req->execute(array(
            $id
        ));
        $data = $req->fetch();
      
        if ($data) {
        return new Billet($data);
        }
        else {
            return false;
        }


       
    }

    public function getList() 
    {
        $db = $this->dbConnect();
        $billets = [];
    
        $req = $db->query('SELECT id, author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC LIMIt 0, 2');
        while ($data = $req->fetch()) {
            $billets[] = new Billet($data);
        }
        return $billets;
        
    }

    public function getListMod() 
    {
        $db = $this->dbConnect();
        $billets = [];
    
        $req = $db->query('SELECT id, author, title, content, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr FROM billet ORDER BY date_modification DESC');
        while ($data = $req->fetch()) {
            $billets[] = new Billet($data);
        }
        return $billets;
        
    }

    

    public function delete($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM billet WHERE id = ?');
        $req->execute([
            $id
        ]);
        
        $req = $db->prepare('DELETE FROM comment WHERE id_billet = ?');
        $req->execute([
            $id
        ]);
       

        
    }

    public function update(Billet $billet) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE billet SET author = :author, title = :title, content = :content, date_modification = NOW() WHERE id = :id');
        $req->execute(array(
           "author" => $billet->author(),
           "title" => $billet->title(),
           "content" => $billet->content(),
           "id" => $billet->id()
        
        ));
    }
}