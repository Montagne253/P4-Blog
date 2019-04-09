<?php

class Comment
{
    private $_id;
    private $_idBillet;
    private $_author;
    private $_comment;
    private $_signaler;
    private $_datecomment;
    

    public function __construct(Array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(Array $data) 
    {
        
        if(isset($data['id']))
        {
            $this->setId($data['id']);
        }
        if(isset($data['id_billet']))
        {
            $this->setIdBillet($data['id_billet']);
        }
        if(isset($data['author']))
        {
            $this->setAuthor($data['author']);
        }
        if(isset($data['comment']))
        {
            $this->setComment($data['comment']);
        }
        if(isset($data['signaler']))
        {
            $this->setSignaler($data['signaler']);
        }
        if(isset($data['date_comment']))
        {
            $this->setDateComment($data['date_comment']);
        }
    }

    public function id()
    {
        return $this->_id;

    }
    public function idBillet()
    {
        return $this->_idBillet;

    }
    public function author()
    {
        return $this->_author;

    }
    public function comment()
    {
        return $this->_comment;

    }
    public function signaler()
    {
        return $this->_signaler;

    }
    public function dateComment()
    {
        return $this->_dateComment;

    }

    public function setId($id)
    {
         $this->_id = $id;
    }
    public function setIdBillet($idBillet)
    {
         $this->_idBillet = $idBillet;
    }
    public function setAuthor($author)
    {
         $this->_author = $author;
    }
    public function setComment($comment)
    {
         $this->_comment = $comment;
    }
    public function setSignaler($signaler)
    {
         $this->_signaler = $signaler;
    }
    public function setDateComment($dateComment)
    {
         $this->_dateComment = $dateComment;
    }

}