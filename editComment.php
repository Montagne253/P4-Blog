<?php 
session_start();


require "model/BilletManager.php";
require "model/Billet.php";

$billetManager = new BilletManager;
$billets = $billetManager->getListMod();


          
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
                <a class="navbar-brand" href="connexion.php">Admin</a>
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


<div class="container-fluid">


<table class="table table-hover table-light">

<thead>
    <tr class="header_tab">
        <td scope="col" >Titre</td>
        <td scope="col" >Date</td>
        <td scope="col" >Auteur</td>
        <td scope="col" >Billet</td>
        <td></td>
    </tr>
</thead>
<tbody>
    
<?php
foreach ($billets as $billet) {
    //while ($donnees = $req->fetch())?>


    <tr>
        <td scope="row"><?= htmlspecialchars($billet->titre()) ?></td>
        <td><?= $billet->dateCreation() ?></td>
        <td><?php echo $billet->auteur(); ?></td>
        <td>
        <?= $resumeComment = $billet->contenu() ?>...
        </td>
          
        <td>
        <em><a class="btn btn-primary_nav_2" href="deleteComment.php?billet=<?php echo $billet->id(); ?>">Modérer commentaires</a></em>
        </td>
    </tr>
  </tbody>

  
<?php
    } // Fin de la boucle des billets
          
    
?>
       

</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
</body>
</html>        
         

