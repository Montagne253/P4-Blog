<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jean Laroche | Écrivain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="public/projet4.css" rel="stylesheet" />
</head>
<body>
<header >
    <div class="container-fluid">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="index.php?action=connexion">Admin</a>
                </div>
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="index.php">HOME</a>
                </div>
                <nav class="navbar navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="title">
                        <h2>JEAN FORTEROCHE | ÉCRIVAIN.</h2>
                        <p>Édition des billets</p>
                    </div>
                </nav>
            </div>
    </div>     
</header>


<div class="container-fluid">


<table class="table table-hover table-dark">
<thead>
<tr class="header_tab">
        <td scope="col" class="titre">Titre</td>
        <td scope="col" class="auteur">Auteur</td>
        <td scope="col" class="date">Date</td>
        <td scope="col" class="modif">Modification</td>
        <td scope="col" class="supp">Suppression</td>
</tr>
</thead>
  <tbody>
    
<?php foreach ($billets as $billet) { ?>
    <tr class="btn_modif">
        <td scope="row"><?php echo htmlspecialchars($billet->title()); ?></td>
        <td><?php echo $billet->author(); ?></td>
        <td><?php echo $billet->dateCreation(); ?></td>
        <td>
            <a class="btn btn-primary_nav" href="index.php?action=edit&billet=<?php echo $billet->id(); ?>">Modifier</a>
        </td>   
        <td>
            <a class="btn btn-primary_delete_nav" href="index.php?action=editBillet&billet=<?php echo $billet->id(); ?>">Supprimer</a>
        </td>
    </tr>
  </tbody>
  
<?php
    } // Fin de la boucle des billets  
?>
       
</div>




<script src="to-top.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>        
         

