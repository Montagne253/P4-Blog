<?php

class CommentManager 
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
    
    public function getList($id) {
        
        $comments = [];
    
        $req = $this->_db->prepare('SELECT id, id_billet, author, comment, signaler, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment FROM comment WHERE id_billet = ? ORDER BY date_comment DESC');
        
        $req->execute(array(
            $id
        ));
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        
            $comments[] = new Comment($data);
        }
        
        return $comments;
        
    }

    public function add(Comment $comment)
    {
        $req = $this->_db->prepare('INSERT INTO comment (id_billet, author, comment, date_comment) VALUES(?, ?, ?, NOW())');
            $req->execute(array(
                $comment->idBillet(),
                $comment->author(),
                $comment->comment()
            ));
            
    }

   
    public function delete($id)
    {
        $req = $this->_db->prepare('DELETE FROM comment WHERE id = ?');
        $req->execute([
            $id
        ]);
    }

    public function update()
    {
        
    }
    

    
    
    
  
}