<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

?>
<?php

 

function truncate($string, $max_length = 30, $replacement = '', $trunc_at_space = false)

{

    $max_length -= strlen($replacement);

    $string_length = strlen($string);

    if($string_length <= $max_length)

    return $string;

    if( $trunc_at_space && ($space_position = strrpos($string, ' ', $max_length-$string_length)) )

    $max_length = $space_position;
    return substr_replace($string, $replacement, $max_length);
}
?>
<?php


         // On récupère les billets
         $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY id DESC');

            
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
                <a class="navbar-brand" href="connexion.php">Admin</a>
                </div>
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


<div class="container-fluid">


<table class="table table-hover table-light">

<thead>
    <tr class="header_tab">
        <td scope="col" >Titre</td>
        <td scope="col" >Date</td>
        <td scope="col" >Billet</td>
        <td></td>
        <td></td>
    </tr>
</thead>
<tbody>
    
<?php

while ($donnees = $req->fetch())
    
{
?>
    <tr>
        <td scope="row"><?php echo htmlspecialchars($donnees['titre']); ?></td>
        <td><?php echo $donnees['date_creation_fr']; ?></td>
        <td>
            <?php
 
            $str = $donnees['contenu'];
            $str = truncate($str, 50, '...', true);
            echo  ' " '  .  $str . ' " '   ;
            // Suspendisse at magna non lectus...
                        // On affiche le contenu du billet
                    // echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
        </td>
        <td>
        <a class="btn btn-primary_nav_2" href="billetById.php?billet=<?php echo $donnees['id']; ?>">Lire la suite</a>
        </td>   
        <td>
        <em><a class="btn btn-primary_nav_2" href="comment.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
        </td>
    </tr>
  </tbody>

  
<?php
    } // Fin de la boucle des billets
          
    
?>
       
       
</div>


<?php
    } // Fin de la boucle des billets
          
    $req->closeCursor();
?>
  








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
</body>
</html>        
         

