<?php 
session_start();

require "model/BilletManager.php";
require "model/Billet.php";

require "model/CommentManager.php";
require "model/Comment.php";

require "model/ProfilManager.php";
require "model/Profil.php";

require('controller/frontend.php');

$frontend = new Frontend;
//$backend = new Backend;


try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listBillet') {
            $frontend->listBillet();
        } elseif ($_GET['action'] == 'billet')
        { 
            $frontend->billet();
        }
        elseif ($_GET['action'] == 'connexion') 
        {
            $frontend->connexion();
        }
        elseif ($_GET['action'] == 'profil')
        {
            $frontend->profil();
        }
        elseif ($_GET['action'] == 'create')
        {
            $frontend->create();
        }
        elseif ($_GET['action'] == 'deconnexion')
        {
            $frontend->deconnexion();
        }
        elseif ($_GET['action'] == 'editComment')
        {
            $frontend->comment();
        }
        elseif ($_GET['action'] == 'edit')
        {
            $frontend->edit();
        }
        elseif ($_GET['action'] == 'editProfil')
        {
            $frontend->editProfil();
        }
        elseif ($_GET['action'] == 'deleteComment')
        {
            $frontend->deleteComment();
        }
        elseif ($_GET['action'] == 'editBillet')
        {
            $frontend->editBillet();
        }
        elseif ($_GET['action'] == 'signin')
        {
            $frontend->signin();
        }
       
    
    }
    else {
            $frontend->listBillet();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
    require('view/errorView.php');
}

//$nombre = '1';
//$int = (int) $nombre;


?>

