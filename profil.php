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
    <title>Profil</title>
</head>
<body>

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
        <a class="img_edit" href="edit.php">
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
    
</body>
</html>
<?php 
}
else 
{
    header('Location: connexion.php');
}
?>
