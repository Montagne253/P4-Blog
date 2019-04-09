<?php

class Comment
{
    private $_id;
    private $_idBillet;
    private $_auteur;
    private $_commentaire;
    private $_signaler;
    private $_dateCommentaire;
    

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
        if(isset($data['auteur']))
        {
            $this->setAuteur($data['auteur']);
        }
        if(isset($data['commentaire']))
        {
            $this->setCommentaire($data['commentaire']);
        }
        if(isset($data['signaler']))
        {
            $this->setSignaler($data['signaler']);
        }
        if(isset($data['date_commentaire']))
        {
            $this->setDateCommentaire($data['date_commentaire']);
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
    public function auteur()
    {
        return $this->_auteur;

    }
    public function commentaire()
    {
        return $this->_commentaire;

    }
    public function signaler()
    {
        return $this->_signaler;

    }
    public function dateCommentaire()
    {
        return $this->_dateCommentaire;

    }

    public function setId($id)
    {
         $this->_id = $id;
    }
    public function setIdBillet($idBillet)
    {
         $this->_idBillet = $idBillet;
    }
    public function setAuteur($auteur)
    {
         $this->_auteur = $auteur;
    }
    public function setcommentaire($commentaire)
    {
         $this->_commentaire = $commentaire;
    }
    public function setSignaler($signaler)
    {
         $this->_signaler = $signaler;
    }
    public function setDateCommentaire($dateCommentaire)
    {
         $this->_dateCommentaire = $dateCommentaire;
    }

}