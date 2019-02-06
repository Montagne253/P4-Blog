<?php 
session_start();

if(isset($_SESSION['id'])) {
    header("Location: profil.php");
    exit();
}
       
$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');
        
        

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
                   
                    header("Location: profil.php");
                    

                }
                else 
                {
                    $error = 'COMPTE INVALIDE<br>Le pseudo ou le mot de passe est incorrect ou n\'existe pas.' ;
                }

               
                
            }
            else 
            {
                $error = "Mauvais email ou mot de passe incorrect ! <a href=\"blog.php\">Mon blog</a>";
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
    <title>Connexion</title>
</head>
<body>

<div align="center">
    <h2>Connexion</h2>

    <br> <br>

    <form method="POST" action="connexion.php">
       <input type="pseudo" name="pseudoconnect" placeholder="pseudo">
       <input type="password" name="passwordconnect" id="" placeholder="password">
       <input class="btn_submit" type="submit" name="submitconnect" value="Connexion">
    </form>
    <br>
    <br>
    <a class="navigation__link__1" href="index.php">Retour au blog</a>
    <a class="navigation__link__1" href="login.php">S'inscrire</a>

   

    <?php 
    if(isset($error))
    {
        echo '<font color="red">' . $error . "</font>";
    }
    ?>
  
</div>
    
</body>
</html>
