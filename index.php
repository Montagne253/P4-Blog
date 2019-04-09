<?php 
session_start();

require "model/BilletManager.php";
require "model/Billet.php";

$billetManager = new BilletManager;
$billets = $billetManager->getList();



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean Laroche | Blog des écrivains</title>
    <link href="projet4.css" rel="stylesheet" /> 
    <link href="public/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>

<body>
      
<header>
    <div class="container-fluid">

        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
            <a class="navbar-brand" href="connexion.php">Admin</a>
            </div>
            <nav class="navbar navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="title">
                    <h1>JEAN FORTEROCHE | ÉCRIVAIN.</h1>
                    <p>Bienvenue sur mon blog !</p>
                </div>
            </nav>
        </div>
    </div>
                
</header>
    <br>
<h3>Les derniers billets</h3>
    <!--Bllog/Billets  -->
<section class="billet" id="billet">

    <div class="billet__container">

<?php foreach ($billets as $billet) { ?>

        <div class="news">
            <h3>
                
                <?= htmlspecialchars($billet->title()) ?>
                <br />
                <div class="date">le <?= $billet->dateCreation() ?></div>
            </h3>
            <p>
    
            <?= $resumeComment = $billet->content() ?>...
            <br />
            <em><a href="billet.php?billet=<?= $billet->id() ?>">Commentaires</a></em>
            <a class="btn btn-primary_nav_edit" href="billet.php?billet=<?= $billet->id() ?>">Lire la suite</a>

            </p>
        </div>
<?php } // Fin de la boucle des billet ?>

    </div>

</section>

        


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
</body>
</html>