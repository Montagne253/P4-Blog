<?php

class Profil 
{
    private $_id;
    private $_pseudo;
    private $_email;
    private $_pass;
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
        if(isset($data['pseudo']))
        {
            $this->setPseudo($data['pseudo']);
        }
        if(isset($data['email']))
        {
            $this->setEmail($data['email']);
        }
        if(isset($data['pass']))
        {
            $this->setPass($data['pass']);
        }
        if(isset($data['date_creation']))
        {
            $this->setDateCreation($data['date_creation']);
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
    public function pseudo()
    {
        return $this->_pseudo;

    }
    public function email()
    {
        return $this->_email;
    }
    public function pass()
    {
        return $this->_pass;
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
    public function setPseudo($pseudo)
    {
         $this->_pseudo = $pseudo;
    }
    public function setEmail($email)
    {
         $this->_email = $email;
    }
    public function setPass($pass)
    {
         $this->_pass = $pass;
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