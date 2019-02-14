<?php 
session_start();


$db = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');



if (isset($_POST['signin'])) 
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hash_password = password_hash($password, PASSWORD_BCRYPT);
   
    if (!empty($_POST['signin'])) {
        

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
                            header('Location: connexion.php');
                        
                            
                            //header('Location: signin.php');
                                
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>

<div class="container_signIn" align="center">
    <h2>Inscription</h2>

    <br> <br>
    <form method="POST" action="signin.php">
        <input type="pseudo" name="pseudo" id="" placeholder="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"><br><br>
        <input type="email" name="email" id="" placeholder="email" value="<?php if(isset($email)) { echo $email; } ?>"><br><br>
        <input type="password" name="password" id="" placeholder="password"><br><br>
        <input type="password" name="confirm_password" id="" placeholder="confirm password"><br><br>
        <input class="btn_submit_edit" type="submit" name="signin" value="Créer son compte"><br><br>
    </form>

   <!-- <form method="post" action="signin.php">
        <table class="signintab">
            <tr>
                <td>
                    <input type="pseudo" name="pseudo" id="" placeholder="pseudo" value="<?php //if(isset($pseudo)) { echo $pseudo; } ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="email" name="email" id="" placeholder="email" value="<?php //if(isset($email)) { echo $email; } ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" id="" placeholder="password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="confirm_password" id="" placeholder="confirm password">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="btn_submit_edit" type="submit" name="signin" value="Créer son compte">
                </td>
            </tr>
        </table>
    </form>-->
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
<p style="color: #2451b9; font-weight: bold;">Déjà un compte ?</p>
<br>

<div class="btn_signin">
<a class="btn btn-primary_nav_edit" href="connexion.php">Se connecter</a>

<div>
<br>
<br>
<a class="btn btn-primary" href="index.php">Retour au blog</a>
    
               
  
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
    
</body>
</html>