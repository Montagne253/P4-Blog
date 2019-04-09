<?php 
session_start();

require "model/BilletManager.php";
require "model/Billet.php";


   
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
            //header('Location: billet.php');
        }
    }


 

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Créer un nouveau billet</title>
</head>
<body>
<?php  if(isset($_SESSION['flash'])) { 
    $flash = $_SESSION['flash'];
    
?>
    <div class="alert alert-success" role="alert">
        <?= $flash ?>
    </div>
<?php   

} 
unset($_SESSION['flash']);
?>
    <div align="center">
        <h2>Créer un nouveau billet</h2>

        <?php 
        if(isset($error))
        {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>

        <form method="POST" action="redaction.php">
            <input type="text" name="author" placeholder="auteur"><br> <p><?php if(isset($error_auteur)){ echo '<font color="red">' . $error_auteur . "</font>"; }?></p><br><br>
            <textarea type="text" name="title" rows="3" cols="110" placeholder="Titre...."></textarea><br><p><?php if(isset($error_titre)){ echo '<font color="red">' . $error_titre . "</font>"; }?></p><br><br><br>
            <textarea class="story" type="text" name="content" rows="50" cols="140" placeholder="Mon histoire..."></textarea><br><p><?php if(isset($error_contenu)){ echo '<font color="red">' . $error_contenu . "</font>"; }?></p><br><br><br>
            
            <input  class="btn_submit_edit" type="submit" name="submitedit" value="Editer">
            
        </form>
</div>
<br>
<br>

<div class="btn_connexion" align='center'>
<a class="btn btn-primary_nav_edit" role="button" href="index.php">Retour au blog</a>
<a class="btn btn-primary_nav_edit" role="button" href="deconnexion.php">Déconnexion</a>
</div>

<br>
<br>

    

<?php  if(isset($_SESSION['flash'])) { 
    $flash = $_SESSION['flash'];
    
?>
    <div class="alert alert-success" role="alert">
        <?= $flash ?>
    </div>
<?php   

} 
unset($_SESSION['flash']);
?>
    
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 


    
</body>
</html>