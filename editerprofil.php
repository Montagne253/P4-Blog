<?php 
session_start();

require "model/ProfilManager.php";
require "model/Profil.php";
       
//$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

if(isset($_SESSION['id']))
{
    /*$requser = $bdd->prepare("SELECT * FROM editeur WHERE id = ?");
    $requser->execute(array(
        $_SESSION['id']
    ));
    $user = $requser->fetch();*/

    $ProfilManager = new ProfilManager;
    $profil = $ProfilManager->get($_SESSION['id']);



    if(isset($_POST['newpseudo'], $_POST['newemail'], $_POST['newmdp']) AND !empty($_POST['newpseudo'])) 
    {
        
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $newemail = htmlspecialchars($_POST['newemail']);
        $newmdp = $_POST['newmdp'];
        $confirm_password = $_POST['confirmnewmdp'];
        $hash_password = password_hash($newmdp, PASSWORD_BCRYPT);

        
        $paul = new Profil(array(
            'pseudo' => $newpseudo,
            'email' =>  $newemail,
            'pass' => $hash_password,
            'id' => $_SESSION['id']
        ));
        $pierre = new ProfilManager();
        $pierre->update($paul);

       /* $insertpseudo = $bdd->prepare("UPDATE editeur SET pseudo = ?, email = ?, pass = ?, date_modification = NOW() WHERE id = ?");
        $insertpseudo->execute(array(
            $newpseudo,
            $newemail,
            $hash_password,
            $_SESSION['id']
        ));*/

        $_SESSION['flash'] = "Votre profil a bien été modifié !";


        header('Location: profil.php?id='.$_SESSION['id']);
        exit();
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
    <title>Éditer Profil</title>
</head>
<body>

    <div align="center">
        <h2>Editer mon profil</h2>
        <form method="POST" action="">
            <input type="text" name="newpseudo" placeholder="pseudo" value="<?php echo /*$user['pseudo']*/$profil->pseudo(); ?>" /><br><br>
            <input type="email" name="newemail" placeholder="email" value="<?php echo /*$user['email']*/$profil->email(); ?>"/><br><br>
            <input type="password" name="newmdp" placeholder="new password"/><br><br>
            <input type="password" name="confirmnewmdp" placeholder="confirm new password" /><br><br>
            <input class="btn_submit_edit" type="submit"  value="Enregistrer" /><br><br>
        </form>

<?php  if(isset($_SESSION['flash'])) { 
    $flash = $_SESSION['flash'];
    
?>
    <div class="alert alert-success" role="alert">
        <?= $flash ?>
    </div>
<?php   

} 
unset($_SESSION['flash']);
?>
    </div>
    <br>
    <br>
    
    <a class="btn btn-primary_nav_edit_profil" href="connexion.php">Retour profil</a>
    
    
</body>
</html>
<?php 
}
else 
{
    header("Location: connexion.php");
}
?>
