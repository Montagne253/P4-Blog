<?php

class Billet
{
    private $_id;
    private $_auteur;
    private $_titre;
    private $_contenu;
    private $_dateCreation;
    private $_dateModification;

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
        if(isset($data['auteur']))
        {
            $this->setAuteur($data['auteur']);
          
        }
        if(isset($data['titre']))
        {
            $this->setTitre($data['titre']);
        }
        if(isset($data['contenu']))
        {
            $this->setContenu($data['contenu']);
        }
        if(isset($data['date_creation_fr']))
        {
            $this->setDateCreation($data['date_creation_fr']);
        }
        if(isset($data['date_modification']))
        {
            $this->setDateModification($data['date_modification']);
        }
    }

    public function id()
    {
        return $this->_id;

    }
    public function auteur()
    {
        return $this->_auteur;

    }
    public function titre()
    {
        return $this->_titre;

    }
    public function contenu()
    {
        return $this->_contenu;

    }
    public function dateCreation()
    {
        return $this->_dateCreation;

    }
    public function dateModification()
    {
        return $this->_dateModification;

    }

    public function setId($id)
    {
         $this->_id = $id;
    }
    public function setAuteur($auteur)
    {
         $this->_auteur = $auteur;
    }
    public function setTitre($titre)
    {
         $this->_titre = $titre;
    }
    public function setContenu($contenu)
    {
         $this->_contenu = $contenu;
    }
    public function setDateCreation($dateCreation)
    {
         $this->_dateCreation = $dateCreation;
    }
    public function setDateModification($dateModification)
    {
         $this->_dateModification = $dateModification;
    }

}