<?php 
session_start();
       
$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

if(isset($_SESSION['id'])) {

    
    $requser = $bdd->prepare('SELECT * FROM editeur WHERE id = ?');
    $requser->execute(array($_SESSION['id']));
    $userinfo = $requser->fetch();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Profil</title>
</head>
<body>
<header >
   

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
                    <h2 >JEAN FORTEROCHE | ÉCRIVAIN.</h2>
                    <p>Bienvenue sur mon blog !</p>
</div>
            </nav>
        </div>
</div>
                
</header>

    <div id="profil" align="center">
        <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>

        <br> <br>

        <p>Pseudo : <?php echo $userinfo['pseudo']; ?></p>

        <br>

        <p>Email : <?php echo $userinfo['email']; ?></p>

        <br>

        <?php 
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
        
        {
        ?>
        <div class="link_billet">
        <a class="img_edit" href="redaction.php">
            <img  src="img/createbillet.png"  />
        </a>
        <a class="img_edit" href="editbillet.php">
            <img  src="img/editbillet.png"  />
        </a>
        </div>
        <br>
        <br>
        <a class="navigation__link__1" href="editerprofil.php">Editer mon profil</a>
        <br>
        <a class="navigation__link__1" href="index.php">Retour au blog</a>
        <br>
        
        <a class="navigation__link__1" href="deconnexion.php">Deconnexion</a>
        <?php
        }
        ?>
    
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
    
</body>
</html>
<?php 
}
else 
{
    header('Location: connexion.php');
}
?>
