<?php $title = 'ADMIN' ?>

<?php ob_start(); ?>
<?php $header = require('nav.php'); ?>
<div class="container-full">
    <header class="masthead" style="background-image: url('public/img/profil.webp')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h2>Créer un nouveau billet</h2>
                        <a href="#down" aria-label="Flêche vers le bas"><i
                                class="fas fa-arrow-circle-down fa-w-12 fa-2x" id="arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

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
<div class="container" align="center">


    <?php 
        if(isset($error))
        {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>

    <form method="POST" action="index.php?action=create" id="down">
        <input required type="text" name="author" placeholder="Auteur"><br>
        <p><?php if(isset($error_auteur)){ echo '<font color="red">' . $error_auteur . "</font>"; }?></p>
        <input required type="text" name="title" rows="3" cols="110" placeholder="Titre" /><br>
        <p><?php if(isset($error_titre)){ echo '<font color="red">' . $error_titre . "</font>"; }?></p>
        <textarea class="story" type="text" id="mytextarea" name="content" rows="50" cols="140"
            placeholder="Mon histoire..."></textarea><br>
        <p><?php if(isset($error_contenu)){ echo '<font color="red">' . $error_contenu . "</font>"; }?></p>
        <input class="btn_submit_edit_com" type="submit" name="submitedit" value="Editer">

    </form>
</div>
<br>
<br>

<div class="btn_connexion" align='center'>
    <a class="btn btn-primary_mind" role="button" href="index.php">Retour au blog</a>
    <a class="btn btn-primary_disco" role="button" href="deconnexion.php">Déconnexion</a>
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