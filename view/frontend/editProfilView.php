<?php $title = 'ADMIN' ?>
<?php $header = require('header.php'); ?>
<?php ob_start(); ?>

    <div align="center">
        <h2>Editer mon profil</h2>
        <form method="POST" action="">
            <input type="text" name="newpseudo" placeholder="pseudo" value="<?php echo $profil->pseudo(); ?>" /><br><br>
            <input type="email" name="newemail" placeholder="email" value="<?php echo $profil->email(); ?>"/><br><br>
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
    
   
    
    
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?> 


