<?php

use OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'Dj253kolo932018');
        //Connexion en ligne => 
        //$db = new \PDO('mysql:host=yamaovhcfkbase.mysql.db;dbname=yamaovhcfkbase;charset=utf8', 'yamaovhcfkbase', 'Protect253');
        return $db;
    }
}