<?php 
session_start();


$db = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');



if (isset($_POST['login'])) 
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hash_password = password_hash($password, PASSWORD_BCRYPT);
   
    if (!empty($_POST['login'])) {
        

        $validation = true;

    
        if(empty($_POST['pseudo'])) {
            $error_pseudo = 'Le pseudo est vide';
            $validation = false;

        }
        if(empty($_POST['email'])) {
            $error_message = 'Email est vide';
            $validation = false;
        }
        if($validation==true) {

            if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirm_password'])) 
            {
                    
                    if(strlen($pseudo) <= 20) {
                        

                    } else 
                    {
                        $error = 'Votre pseudo ne doit pas dépasser 20 caractéres !';
                    }

                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                    

                        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
                        {  
                        }
                        else
                        {
                            $error = 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
                        }

                        


                        if($password == $confirm_password) 
                        {
                            $hash_password = password_hash($password, PASSWORD_BCRYPT);
                            
                            $req = $db->prepare('INSERT INTO editeur (pseudo, email, pass, date_creation) VALUES(?, ?, ?, NOW())');
                            $req->execute(array(
                                $pseudo,
                                $email,
                                $hash_password,
                                ));
                            $error = "Votre compte a bien été créé !";
                            $_SESSION['comptecree'] = 'Votre compe à été créé !';
                        
                            
                            //header('Location: login.php');
                                
                        } else 
                        {
                            $error = "Vos mots de passes ne correspondent pas !";
                        }
                        
                        
                    }
            }

            else 
            {
                    $error = "Tous les champs doivent être complétés";
            }
        }
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
    <title>Inscription</title>
</head>
<body>

<div align="center">
    <h2>Inscription</h2>

    <br> <br>

    <form method="post" action="login.php">
        <table class="logintab">
            <tr>
                <td align="right">
                    <label for="pseudo">Pseudo :</label>           
                </td>
                <td>
                    <input type="pseudo" name="pseudo" id="" placeholder="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="email">Email :</label>           
                </td>
                <td>
                    <input type="email" name="email" id="" placeholder="email" value="<?php if(isset($email)) { echo $email; } ?>">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="pasword">Mot de passe :</label>           
                </td>
                <td>
                    <input type="password" name="password" id="" placeholder="password">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="confirm_password">Confirmation mot de passe :</label>           
                </td>
                <td>
                    <input type="password" name="confirm_password" id="" placeholder="confirm password">
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="center">
                    
                    <input class="btn_submit" type="submit" name="login" value="Créer son compte">
                </td>
            </tr>
        </table>
    </form>
    <?php 
    if(isset($error))
    {
        echo '<font color="red">' . $error . "</font>";
    }
    ?>
<br>
<br>
<br>
<br>
<br>
<br>
<p>Déjà un compte ?</p>
<br>


<a class="navigation__link__1" href="connexion.php">Se connecter</a>
<br>
<a class="navigation__link__1" href="index.php">Retour au blog</a>
   
    
                
  
</div>
    
</body>
</html>