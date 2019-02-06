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
            header('Location: editbillet.php?billet=' . $_GET['billet']);

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
<header class="header">
        <div class="header__element">
        <div class="title">
        <h2 style="text-align: center">Mes billets</h2>
            
        </div>
            <nav class="navigation">       
                <ul class="navigation__menu--header">
                    <li class="navigation__menu__id--header">
                        <a class="navigation__link" href="editbillet.php">Éditer billets</a>
                    </li>
                    <li class="navigation__menu__id--header">
                        <a class="navigation__link" href="billet.php">Billets</a>
                    </li>
                </ul>
            </nav>
        </div>
</header>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php

     //mettre une variable pour afficher q'une partie du texte 
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
        
        <em><a href="editbillet.php?billet=<?php echo $_GET['billet'] ?>">Supprimmer</a></em>
    <?php
    
    } // Fin de la boucle des commentaires
    $req->closeCursor();
?>
</div>

<br>
<br>
<br>
<br>
<br>
<br>

<a class="navigation__link__1" href="editbillet.php">Editer billets</a>
        <br>
<a class="navigation__link__1" href="index.php">Retour au blog</a>
</body>
</html>