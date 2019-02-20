<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

   
    if (!empty($_POST['submitedit'])) {
        

        $validation = true;

    
        if(empty($_POST['auteur'])) {
            $error_auteur = 'L\' auteur est vide';
            $validation = false;

        }
        if(empty($_POST['titre'])) {
            $error_titre = 'Le titre est vide';
            $validation = false;
        }
        if(empty($_POST['contenu'])) {
            $error_contenu = 'Le texte est vide';
            $validation = false;
        }
        if($validation==true) {
            $req = $bdd->prepare('INSERT INTO billet (auteur, titre, contenu, date_creation) VALUES(?, ?, ?, NOW())');
            
            $req->execute(array(
                $_POST['auteur'], 
                $_POST['titre'],
                $_POST['contenu']
            ));
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
    <link href="projet4.css" rel="stylesheet" />
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
        <br>
        <br>
        <br>
        <?php 
        if(isset($error))
        {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>
        <br>
        <br>

        <form method="POST" action="redaction.php">
            <input type="text" name="auteur" placeholder="auteur"><br> <p><?php if(isset($error_auteur)){ echo '<font color="red">' . $error_auteur . "</font>"; }?></p><br><br>
            <textarea type="text" name="titre" rows="3" cols="110" placeholder="Titre...."></textarea><br><p><?php if(isset($error_titre)){ echo '<font color="red">' . $error_titre . "</font>"; }?></p><br><br><br>
            <textarea class="story" type="text" name="contenu" rows="50" cols="140" placeholder="Mon histoire..."></textarea><br><p><?php if(isset($error_contenu)){ echo '<font color="red">' . $error_contenu . "</font>"; }?></p><br><br><br>
            
            <input  class="btn_submit_edit" type="submit" name="submitedit" value="Editer">
            
        </form>
</div>
        <br>
        <br>
   
    <div class="btn_edit">
        <a class="btn btn-primary_nav_edit" role="button" href="index.php">Retour au blog</a>
        <a class="btn btn-primary_nav_edit" role="button" href="deconnexion.php">Se deconnecter</a>
        <a class="btn btn-primary_nav_edit" role="button" href="billet.php">Mes billets</a>
    </div>

    

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