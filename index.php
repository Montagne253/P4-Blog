<?php 
session_start();

require "model/BilletManager.php";
require "model/Billet.php";

require "model/CommentManager.php";
require "model/Comment.php";

require "model/ProfilManager.php";
require "model/Profil.php";

require('controller/controller.php');

$controller = new controller;
//$backend = new Backend;


try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listBillet') {
            $controller->listBillet();
        } elseif ($_GET['action'] == 'billet')
        { 
            $controller->billet();
        }
        elseif ($_GET['action'] == 'connexion') 
        {
            $controller->connexion();
        }
        elseif ($_GET['action'] == 'profil')
        {
            $controller->profil();
        }
        elseif ($_GET['action'] == 'create')
        {
            $controller->create();
        }
        elseif ($_GET['action'] == 'deconnexion')
        {
            $controller->deconnexion();
        }
        elseif ($_GET['action'] == 'editComment')
        {
            $controller->comment();
        }
        elseif ($_GET['action'] == 'edit')
        {
            $controller->edit();
        }
        elseif ($_GET['action'] == 'editProfil')
        {
            $controller->editProfil();
        }
        elseif ($_GET['action'] == 'deleteComment')
        {
            $controller->deleteComment();
        }
        elseif ($_GET['action'] == 'editBillet')
        {
            $controller->editBillet();
        }
        elseif ($_GET['action'] == 'signin')
        {
            $controller->signin();
        }
        elseif ($_GET['action'] == 'about')
        {
            $controller->about();
        }
        elseif ($_GET['action'] == 'allBillet')
        {
            $controller->allBillet();
        }
        else {
            $controller->error();
        }
       
    
    }
    else {
            $controller->listBillet();
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
    require('view/errorView.php');
}

//$nombre = '1';
//$int = (int) $nombre;


?>

