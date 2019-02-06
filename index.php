<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean Laroche | Blog des écrivains</title>
    <link href="projet4.css" rel="stylesheet" /> 
    <link href="style.css" rel="stylesheet" />
    </head>

   
    <body>
      
    <header class="header">
        <div class="header__element">
        <div class="title">
        <h2 style="text-align: center">JEAN FORTEROCHE | ÉCRIVAIN.</h2>
            <p>Bienvenue sur mon blog !</p>
        </div>
            <nav class="navigation">       
                <ul class="navigation__menu--header">
                        <li class="navigation__menu__id--header">
                            <a class="navigation__link" href="#index.php">Accueil</a>
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

    <!--Bllog/Billets  -->
    <section class="billet" id="billet">

        <div class="billet__container">
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

                    // On récupère les 5 derniers billets
            $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC LIMIT 0, 2 ');

            
           while ($donnees = $req->fetch())
            {
               
            ?>
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
                <em><a href="comment.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
                </p>
            </div>
            <?php
            } // Fin de la boucle des billets
            
            $req->closeCursor();
            ?>



        </div>

    </section>

        



</body>
</html>