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
            $error = "Votre billet a bien été créé ! <a class=\"navigation__menu__link\" href=\"billet.php\">Mes billets</a>";
            $_SESSION['billet'] = 'Votre billet à été créé !';
           
            // Redirection du visiteur vers la page des billlets
            header('Location: billet.php');
        }
    }






        

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
    <title>Créer un nouveau billet</title>
</head>
<body>
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
    <a class="navigation__link__1" href="billet.php">Mes billets</a>

    <a class="navigation__link__1" href="blog.php">Retour au blog</a>
    <a class="navigation__link__1" href="deconnexion.php">Se deconnecter</a>
   

    

        <?php 
        if(isset($error))
        {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>
    
    


    
</body>
</html>