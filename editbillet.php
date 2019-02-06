<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

?>
<?php

         // On récupère les 5 derniers billets
    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC');

    while ($donnees = $req->fetch())
    {
             
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jean Laroche | Écrivain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="projet4.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    
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
                            <a class="navigation__link" href="index.php">Accueil</a>
                        </li>
                        <li class="navigation__menu__id--header">
                            <a class="navigation__link" href="billet.php">Billets</a>
                        </li>
                        <li class="navigation__menu__id--header">
                            <a class="navigation__link" href="profil.php">Éditer</a>
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
              // On affiche le contenu du billet
              echo nl2br(htmlspecialchars($donnees['contenu']));
              ?>
             
              <br />
              <em><a href="edit.php?billet=<?php echo $donnees['id']; ?>">Modifier</a></em>
              <br />
              <em><a href="edit.php?billet=<?php echo $donnees['id']; ?>">Supprimer</a></em>
              <br />
              <em><a href="deleteComment.php?billet=<?php echo $donnees['id']; ?>">Modérer | Supprimmer commentaires</a></em>
              </p>  
</div>
<?php
    } // Fin de la boucle des billets
          
    $req->closeCursor();
?>

          <br>
          <br>
          <br>

<a class="navigation__link__1" href="blog.php">Retour au blog</a>

<div id="scrollUp">
<a class="top" href="#top"><img  class="scrollUp" src="img/to_top.png"/></a>
</div>

<script src="to-top.js"></script>
</body>
</html>        
         
