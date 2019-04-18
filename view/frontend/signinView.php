<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>

<div class="container_signIn" align="center">
    <h2>Inscription</h2>
    <form method="POST" action="index.php?action=signin">
        <input type="pseudo" name="pseudo" id="" placeholder="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"><br><br>
        <input type="email" name="email" id="" placeholder="email" value="<?php if(isset($email)) { echo $email; } ?>"><br><br>
        <input type="password" name="password" id="" placeholder="password"><br><br>
        <input type="password" name="confirm_password" id="" placeholder="confirm password"><br><br>
        <input class="btn_submit_edit" type="submit" name="signin" value="Créer son compte"><br><br>
    </form>

    </header>

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

<p style="color: #2451b9; font-weight: bold;">Déjà un compte ?</p>

<div class="btn_signin">
<a class="btn btn-primary_nav_edit" href="index.php?action=connexion">Se connecter</a>

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