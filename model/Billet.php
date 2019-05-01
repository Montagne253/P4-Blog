<?php

class Billet
{
    private $_id;
    private $_author;
    private $_title;
    private $_content;
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
        if(isset($data['author']))
        {
            $this->setAuthor($data['author']);
          
        }
        if(isset($data['title']))
        {
            $this->setTitle($data['title']);
        }
        if(isset($data['content']))
        {
            $this->setContent($data['content']);
        }
        if(isset($data['date_creation_fr']))
        {
            $this->setDateCreation($data['date_creation_fr']);
        }
        if(isset($data['date_modification_fr']))
        {
            $this->setDateModification($data['date_modification_fr']);
        }
    }

    public function id()
    {
        return $this->_id;

    }
    public function author()
    {
        return $this->_author;

    }
    public function title()
    {
        return $this->_title;

    }
    public function content()
    {
        return $this->_content;

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
    public function setAuthor($author)
    {
         $this->_author = $author;
    }
    public function setTitle($title)
    {
         $this->_title = $title;
    }
    public function setContent($content)
    {
         $this->_content = $content;
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