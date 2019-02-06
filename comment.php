<?php
// Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

        // Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();

$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM comment WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));


    if (!empty($_POST)) {

        $validation = true;

    
        if(empty($_POST['auteur'])) {
            $error_auteur = 'Aucun auteur';
            $validation = false;

        }
        if(empty($_POST['commentaire'])) {
            $error_commentaire = 'Le commentaire est vide';
            $validation = false;
        }
        if($validation==true) {
                    // Insertion du message à l'aide d'une requête préparée
            $req = $bdd->prepare('INSERT INTO comment (id_billet, auteur, commentaire, date_commentaire) VALUES(:idBillet, :auteur, :commentaire, NOW())');
            $req->execute(array(
               "idBillet" => $_GET['billet'], 
                "auteur" => $_POST['auteur'], 
                "commentaire" => $_POST['commentaire']
            ));
            
            // Redirection du visiteur vers la page du commentaire
            header('Location: comment.php?billet=' . $_GET['billet']);

        }
    }
?>


<!DOCTYPE html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <title>Commentaires</title>
</head>
    
<body>



<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>
<div class="comment">
<h4>Commentaires</h4>

<?php

    while ($donnees = $req->fetch())
    {
    ?>
        
        <h5><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></h5>
        <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
    <?php
    } // Fin de la boucle des commentaires
    $req->closeCursor();
?>



<form method="post" action="comment.php?billet=<?php echo $_GET['billet'] ?>" method="post">
        <table class="commentTab">
            <tr>
                <td align="right">
                <label for="auteur">Auteur</label> :        
                </td>
                <td>
                <input type="text" name="auteur" id="auteur" /><br />
                <p><?php if(isset($error_auteur)){ echo $error_auteur; }?></p> 
                </td>
            </tr>
            <tr>
                <td align="right">
                <label for="commentaire">Commenter</label> :            
                </td>
                <td>
                <input type="text" name="commentaire" id="commentaire" /><br />
                <p><?php if(isset($error_commentaire)){ echo $error_commentaire; } ?></p>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <br>
                <td>
                <input class="btn_submit_comment" type="submit" value="Envoyer" />
                </td>
            </tr>
        </table>
    </form>



    

<br>
<br>
<br>

<?php


?>
<a class="navigation__link__1" href="index.php">Retour au blog</a>
</body>
</html>