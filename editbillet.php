<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

?>


<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jean Laroche | Écrivain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="projet4.css" rel="stylesheet" />
    
    
</head>
<body>
<header >
    <div class="container-fluid">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="connexion.php">Admin</a>
                </div>
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="billet.php">Mes billets</a>
                </div>
                <nav class="navbar navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="title">
                        <h2>JEAN FORTEROCHE | ÉCRIVAIN.</h2>
                        <p>Édition</p>
                    </div>
                </nav>
            </div>
    </div>     
</header>

<?php

         // On récupère les 5 derniers billets
    $req = $bdd->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY date_creation DESC');
    
  
        
        
       
?>
   

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
    
<?php

while ($donnees = $req->fetch())
    
{
?>
    <tr class="btn_modif">
        <td scope="row"><?php echo htmlspecialchars($donnees['titre']); ?></td>
        <td><?php echo $donnees['auteur']; ?></td>
        <td><?php echo $donnees['date_creation_fr']; ?></td>
        <td>
            <a class="btn btn-primary_nav" href="edit.php?billet=<?php echo $donnees['id']; ?>">Modifier</a>
        </td>   
        <td>
            <a class="btn btn-primary_nav" href="delete.php?billet=<?php echo $donnees['id']; ?>">Supprimer</a>
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
         

