<?php
require_once("model/Manager.php"); 

class CommentManager extends Manager
{

    
    public function getList($id) {
        $db = $this->dbConnect();
        
        $comments = [];
    
        $req = $db->prepare('SELECT id, id_billet, author, comment, signaler, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment FROM comment WHERE id_billet = ? ORDER BY date_comment DESC');
        
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
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comment (id_billet, author, comment, date_comment) VALUES(?, ?, ?, NOW())');
            $req->execute(array(
                $comment->idBillet(),
                $comment->author(),
                $comment->comment()
            ));
            
    }

   
    public function delete($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $req->execute([
            $id
        ]);
    }

    public function updateSignal(Comment $comment)
    {
        // var_dump($comment);
        // die();
        $db  = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET signaler = :signaler  WHERE id = :id');
        $req->execute(array(
            "id" => $comment->id(),
            "signaler" => $comment->signaler()
    
        ));

        
    }
    

    
    
    
  
}