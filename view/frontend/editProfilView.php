<?php $title = 'ADMIN' ?>
<?php  require('nav.php'); ?>
<?php  require('header.php'); ?>
<?php ob_start(); ?>

<div class="container" align="center">
    <h2>Editer mon profil</h2>
    <br>
    <form method="POST" action="">
    <div class="form-group">
        <input required type="text" name="newpseudo" placeholder="pseudo" class="form-control" id="exampleInputPseudo"
            value="<?php echo $profil->pseudo(); ?>" />
    </div>
    <div class="form-group">
        <input required type="email" name="newemail" placeholder="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            value="<?php echo $profil->email(); ?>" />
    </div>
    <div class="form-group">
        <input required type="password" name="newmdp" placeholder="new password" class="form-control" id="exampleInputPassword1" />
    </div>
    <div class="form-group">
        <input required type="password" name="confirmnewmdp" placeholder="confirm new password" class="form-control" id="exampleInputPassword1" />
    </div><br>
        <input class="btn btn-primary" type="submit" value="Enregistrer" /><br><br>
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




<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>


