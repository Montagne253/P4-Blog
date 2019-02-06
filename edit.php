<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

    if(isset($_GET['billet']) AND !empty($_GET['billet'])) {
        // Récupération du billet

    $edit = htmlspecialchars($_GET['billet']);
    
    $edit_billet = $bdd->prepare('SELECT id, auteur, titre, contenu FROM billet WHERE id = ?');
    $edit_billet->execute(array($edit));
   
    if($edit_billet->rowCount() == 1) {

        $edit_billet = $edit_billet->fetch();
        $edit_id = $edit_billet['id'];
        $edit_titre = $edit_billet['titre'];
        $edit_auteur = $edit_billet['auteur'];
        $edit_contenu = $edit_billet['contenu'];



    } else {
        die('Erreur : Le billet n\'existe pas');
    }

     


    if (!empty($_POST)) {
        

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
            $requpdate = $bdd->prepare('UPDATE billet SET auteur = ?, titre = ?, contenu = ?, date_creation = NOW() WHERE id = ?');
            
            $requpdate->execute(array(
                $edit_billet['auteur'], 
                $edit_billet['titre'],
                $edit_billet['contenu']
            ));

            $error = "Votre billet a bien été modifier ! <a class=\"navigation__menu__link\" href=\"billet.php\">Mes billets</a>";
            $_SESSION['modifier'] = 'Votre billet à été modifié !';
           
            // Redirection du visiteur vers la page des billlets
            header('Location: editbillet.php?billet=' . $edit_billet['id']);
        }
    }


    
    }


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
    <title>Modifier votre billet</title>
</head>
<body>
    <div align="center">
        <h2>Modifier votre billet</h2>
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

        <form method="POST" action="edit.php?billet=<?= $edit_billet['id'] ?>">
            <input type="text" name="auteur" placeholder="" value="<?= $edit_billet['auteur'] ?>"><br><br><br>
            <textarea type="text" name="titre" rows="3" cols="110" placeholder=""><?= $edit_billet['titre'] ?></textarea><br><br><br>
            <textarea class="story" type="text" name="contenu" rows="50" cols="140" placeholder=""><?= $edit_billet['contenu'] ?></textarea><br>
            
            <br><br><br>
            <input  class="btn_submit_edit" type="submit" name="edit" value="Modifier">
            
        </form>
</div>
        <br>
        <br>
    <a class="navigation__link__1" href="editbillet.php">Mes billets</a>

    <a class="navigation__link__1" href="blog.php">Retour au blog</a>
    <a class="navigation__link__1" href="deconnexion.php">Se deconnecter</a>
   

    

        <?php 
        if(isset($error))
        {
            echo '<font color="white">' . $error . "</font>";
        }
        ?>
    
    


    
</body>
</html>