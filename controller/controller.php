<?php 


class Controller {

    function index()
    {

        $billetManager = new BilletManager;
        $billets = $billetManager->getList();

        require('view/frontend/indexView.php');
        
    }

    function listBillet()
    {

        $billetManager = new BilletManager;
        $billets = $billetManager->getList();

        require('view/frontend/listBilletView.php');
        
    }


    function editComment()
    {
        $billetManager = new BilletManager;
        $billets = $billetManager->getList();
        require('view/frontend/editCommentView.php');
        
    }

    function deleteComment()
    {
        $billetManager = new BilletManager;
        $billet = $billetManager->get($_GET['billet']);

        $commentManager = new CommentManager;
        $comments = $commentManager->getList($_GET['billet']);



        if (isset($_POST['delete'])) {

            $commentManager = new CommentManager;
            $comment = $commentManager->delete($_POST['idComment']);

            $_SESSION['flash'] = "Votre commentaire a bien été supprimé !";
        
           
            
            header('Location: index.php?action=deleteComment&billet='.$_GET['billet']);
            exit();

            
        
        }

        require('view/frontend/deleteCommentView.php');
        
    }

    function billet()
    {
        $billetManager = new BilletManager;
        $billet = $billetManager->get($_GET['billet']);

        if($billet==false) {
            header('Location: index.php?action=error');
            exit();
        }
        
        $commentManager = new CommentManager;
        $comments = $commentManager->getList($_GET['billet']);
        

            if (!empty($_POST)) {
        
                $validation = true;
        
            
                if(empty($_POST['author'])) {
                    $error_author = 'Aucun auteur';
                    $validation = false;
                }
                if(empty($_POST['comment'])) {
                    $error_comment = 'Le commentaire est vide';
                    $validation = false; 
                }
                if($validation==true) {
                            // Insertion du message à l'aide d'une requête préparée
                    $comment = new Comment([
                        "id_billet" => $_GET['billet'], 
                        "author" => $_POST['author'], 
                        "comment" => $_POST['comment']
                    ]);
        
                    $commentManager = new CommentManager;
                    $commentManager->add($comment);


                    }


                    
                    $_SESSION['flash'] = "Votre commentaire a bien été posté !";
                    
                    
                    // Redirection du visiteur vers la page du comment
                    header('Location: index.php?action=billet&billet=' . $_GET['billet']);
                    exit();
        
                }
                
                

                if(isset($_GET['signaler'])) {   
                    
                        $signal = new Comment(array(
                            'signaler' => 1,
                            'id' => $_GET['signaler']
                        ));
                        $editSignal = new CommentManager();
                        $editSignal->updateSignal($signal);
                        
                }
        
        
            

        require('view/frontend/billetView.php');
        
    }

    function profil()
    {
        if(isset($_SESSION['id'])) {

            $ProfilManager = new ProfilManager;
            $profil = $ProfilManager->get($_SESSION['id']);

            if(isset($_SESSION['id']) AND $profil->id() == $_SESSION['id'])
            {
                
            }
        }
        else 
        {
            header('Location: index.php?action=connexion');
        }

        require('view/frontend/profilView.php');

    }

    
    function create() 
    {
        if (!empty($_POST['submitedit'])) {
        

            $validation = true;
    
        
            if(empty($_POST['author'])) {
                $error_auteur = 'L\' auteur est vide';
                $validation = false;
    
            }
            if(empty($_POST['title'])) {
                $error_titre = 'Le titre est vide';
                $validation = false;
            }
            if(empty($_POST['content'])) {
                $error_contenu = 'Le texte est vide';
                $validation = false;
            }
            if($validation==true) {
                $billet = new Billet([
                    'author' => $_POST['author'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ]);
                $billetManager = new BilletManager;
                $billetManager->add($billet);
                
                $_SESSION['flash'] = "Votre billet à bien été créé !";
               
                // Redirection du visiteur vers la page des billlets
                header('Location: index.php?action=listBillet');
            }

            
        }

        require('view/frontend/createView.php');
    }

    function editBillet()
    {
        $billetManager = new BilletManager;
        $billets = $billetManager->getListMod();


        if(isset($_GET['billet']) AND !empty($_GET['billet'])) {

            $billetId = htmlspecialchars($_GET['billet']);

            $delete = new BilletManager;
            $billet = $delete->delete($billetId);



            header('Location: index.php?action=editBillet');

        }

        require('view/frontend/editBilletView.php');

    }

    function edit()
    {

    $billetManager = new BilletManager;
    $billet = $billetManager->get($_GET['billet']);


    if(isset($_GET['billet']) AND !empty($_GET['billet'])) {
        

        if(isset($_POST['newauthor'], $_POST['newtitle'], $_POST['newcontent']))
        {            
            $newAuthor = $_POST['newauthor'];
            $newTitle = $_POST['newtitle'];
            $newContent = $_POST['newcontent'];
        

        
            $newBillet = new Billet(array(
                'author' => $newAuthor,
                'title' => $newTitle,
                'content' => $newContent,
                'id' => $_GET['billet']
            ));
            $editBillet = new BilletManager();
            $editBillet->update($newBillet);

            

        header('Location: index.php?action=editBillet&id='.$_GET['billet']);
        exit();

        } 

    }

        require('view/frontend/editView.php');

    }

    function editProfil()
    {
        if(isset($_SESSION['id']))
        {
        

            $ProfilManager = new ProfilManager;
            $profil = $ProfilManager->get($_SESSION['id']);



            if(isset($_POST['newpseudo'], $_POST['newemail'], $_POST['newmdp']) AND !empty($_POST['newpseudo'])) 
            {
                
                $newpseudo = htmlspecialchars($_POST['newpseudo']);
                $newemail = htmlspecialchars($_POST['newemail']);
                $newmdp = $_POST['newmdp'];
                $confirm_password = $_POST['confirmnewmdp'];
                $hash_password = password_hash($newmdp, PASSWORD_BCRYPT);

                
                $paul = new Profil(array(
                    'pseudo' => $newpseudo,
                    'email' =>  $newemail,
                    'pass' => $hash_password,
                    'id' => $_SESSION['id']
                ));
                $pierre = new ProfilManager();
                $pierre->update($paul);

            

                $_SESSION['flash'] = "Votre profil a bien été modifié !";


                header('Location: index.php?action=profil&id='.$_SESSION['id']);
                exit();

            }
        } 

        require('view/frontend/editProfilView.php');
    }


    function connexion()
    {
        if(isset($_SESSION['id'])) {
            header('Location: index.php?action=profil&id='.$_SESSION['id']);
            exit();
        }
        
            if(isset($_POST['submitConnect'])) 
            {
                $pseudoConnect = htmlspecialchars($_POST['pseudoConnect']);
                $passwordconnect = $_POST['passwordconnect'];
                    
                if(!empty($pseudoConnect) AND !empty($passwordconnect))
                {
                    $ProfilManager = new ProfilManager;
                    $user = $ProfilManager->getPseudo($pseudoConnect);
        
                // $userexist = $requser->rowCount();
                    if($user) 
                    {
                    
                        if((password_verify($passwordconnect, $user->pass())))
                        {
                            $_SESSION['id'] = $user->id();
                        
                        header('Location: index.php?action=profil&id='.$_SESSION['id']);
                            
        
                        }
                        else 
                        {
                            $error = 'COMPTE INVALIDE<br>Le pseudo ou le mot de passe est incorrect ou n\'existe pas.' ;
                        }
                    }
                    else 
                    {
                        $error = "Mauvais pseudo ou mot de passe incorrect !";
                    }
                }
                else 
                {
                    $error = 'Tous les champs doivent être remplis !';  
                }   
            }

        require('view/frontend/connexionView.php');
    }

    function about() {
        require('view/frontend/aboutView.php');
    }

    function error()
    {
        require('view/frontend/errorView.php');
    }

    function deconnexion()
    {
        session_start();
        $_SESSION = array();
        session_destroy();

        header('Location: index.php?action=connexion');

        require('view/frontend/profilView.php');

        require('view/frontend/connexionView.php');
    }

}

