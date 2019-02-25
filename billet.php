<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

?>


<?php


$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet WHERE id = ?');
$req->execute(array($_GET['billet']));


         while ($donnees = $req->fetch())
          {


             
?>
    
<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
    <title>Billets</title>
    
</head>
<body>
<header >
    <div class="container-fluid">

            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="billet.php">Mes billets</a>
                </div>
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="index.php">HOME</a>
                </div>
                <nav class="navbar navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="title">
                        <h1 >JEAN FORTEROCHE | ÉCRIVAIN.</h1>
                        <p>Bienvenue sur mon blog !</p>
                    </div>
                </nav>
            </div>
    </div>
                
</header>

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

<br>
<br>
<br>

<div id="scrollUp">
<a class="top" href="#top"><img  class="scrollUp" src="img/to_top.png"/></a>
</div>
<div class="nav__exit">
<a class="btn btn-primary_nav" role="button" href="index.php">Retour au blog</a>
</div>



<script src="to-top.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
</body>
</html>        