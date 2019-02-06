<?php 
session_start();
       
$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM editeur WHERE id = ?");
    $requser->execute(array(
        $_SESSION['id']
    ));
    $user = $requser->fetch();

    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) 
    {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $db->prepare("UPDATE editeur SET newpseudo = ? WHERE id = ?");
        $insertpseudo->execute(array(
            $newpseudo,
            $_SESSION['id']
        ));
        header('Location: profil.php?id='.$_SESSION['id']);
    }




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

    <div align="center">
        <h2>Editer mon profil</h2>
        <form method="POST" action="">
            <input type="text" name="newpseudo" placeholder="pseudo" value="<?php echo $user['pseudo']; ?>" /><br><br>
            <input type="email" name="newemail" placeholder="email" value="<?php echo $user['email']; ?>"/><br><br>
            <input type="password" name="newmdp" placeholder="password"/><br><br>
            <input type="password" name="confirmnewmdp" placeholder="confirm password" /><br><br>
            <input class="btn_submit_edit" type="submit"  value="Enregister les changements" /><br><br>
        </form>
    </div>
    <br>
    <br>
    <a class="navigation__link__1" href="index.php">Retour au blog</a>
    
</body>
</html>
<?php 
}
else 
{
    header("Location: connexion.php");
}
?>
