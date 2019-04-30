<?php $title = 'ADMIN' ?>
<?php $header = require('header.php'); ?>
<?php ob_start(); ?>
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
    <div align="center">
        <h2>Créer un nouveau billet</h2>

        <?php 
        if(isset($error))
        {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>

        <form method="POST" action="index.php?action=create">
            <input type="text" name="author" placeholder="auteur"><br> <p><?php if(isset($error_auteur)){ echo '<font color="red">' . $error_auteur . "</font>"; }?></p><br><br>
            <input type="text" name="title" rows="3" cols="110" placeholder="Titre...."/><br><p><?php if(isset($error_titre)){ echo '<font color="red">' . $error_titre . "</font>"; }?></p><br><br><br>
            <textarea class="story" type="text" id="mytextarea" name="content" rows="50" cols="140" placeholder="Mon histoire..."></textarea><br><p><?php if(isset($error_contenu)){ echo '<font color="red">' . $error_contenu . "</font>"; }?></p><br><br><br>
            
            <input  class="btn_submit_edit" type="submit" name="submitedit" value="Editer">
            
        </form>
</div>
<br>
<br>

<div class="btn_connexion" align='center'>
<a class="btn btn-primary_nav_edit" role="button" href="index.php">Retour au blog</a>
<a class="btn btn-primary_nav_edit" role="button" href="deconnexion.php">Déconnexion</a>
</div>

<br>
<br>

    

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
    
<?php $footer = require('footer.php'); ?>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
