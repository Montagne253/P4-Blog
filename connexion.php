<?php 
session_start();


       
$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

if(isset($_SESSION['id'])) {
    header('Location: profil.php?id='.$_SESSION['id']);
    exit();
}
        
        

    if(isset($_POST['submitconnect'])) 
    {
        $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
        $passwordconnect = $_POST['passwordconnect'];
            
        if(!empty($pseudoconnect) AND !empty($passwordconnect))
        {
            $requser = $bdd->prepare("SELECT * FROM editeur WHERE pseudo = ?");
            $requser->execute(array(
                $pseudoconnect
            ));
            $userexist = $requser->rowCount();
            if($userexist == 1) 
            {
                
                var_dump($userexist);
                $userinfo = $requser->fetch();
                
                if((password_verify($passwordconnect, $userinfo['pass'])))
                {
                    $_SESSION['id'] = $userinfo['id'];
                   
                   header('Location: profil.php?id='.$_SESSION['id']);
                    

                }
                else 
                {
                    $error = 'COMPTE INVALIDE<br>Le pseudo ou le mot de passe est incorrect ou n\'existe pas.' ;
                }

               
                
            }
            else 
            {
                $error = "Mauvais email ou mot de passe incorrect !";
            }
        }
        else 
        {
            $error = 'Tous les champs doivent être remplis !';  
        }
            
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>

<div id="connexion" align="center">
    <h2>Connexion</h2>

    <br> <br>

    <form method="POST" action="connexion.php">
       <input type="pseudo" name="pseudoconnect" placeholder="pseudo">
       <input type="password" name="passwordconnect" id="" placeholder="password">
       <input class="btn_submit_edit" type="submit" name="submitconnect" value="Connexion">
    </form>
    <br>
    <br>
    <a class="btn btn-primary_nav" role="button" href="index.php">Retour au blog</a>
    <a class="btn btn-primary_nav" role="button" href="signin.php">S'inscrire</a>

   

    <?php 
    if(isset($error))
    {
        echo '<font color="red">' . $error . "</font>";
    }
    ?>
  
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
    
</body>
</html>
