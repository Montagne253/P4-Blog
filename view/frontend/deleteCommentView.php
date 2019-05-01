<?php $title = 'ADMIN' ?>
<?php  require('nav.php'); ?>
<?php  require('header.php'); ?>
<?php ob_start(); ?>
<?php  if(isset($_SESSION['flash'])) { 
    $flash = $_SESSION['flash'];
    
?>
    <div class="alert alert-danger" role="alert">
        <?= $flash ?>
    </div>
<?php   

} 
unset($_SESSION['flash']);
?>
<br><br>
<div class="container" align="center">
    <h3>
        <?php echo $billet->title(); ?>
        <div class="date">le <?= $billet->dateModification(); ?></div>
    </h3>
       <br>
    <a class="btn btn-primary" href="index.php?action=billet&billet=<?php echo $billet->id(); ?>">Lire le billet</a>
 
    <br><br><br><br>


    <h4>Modération des commentaires</h4>
    <br><br>
    <div class="container">


    <table class="table table-hover table-dark">
    <thead>
    <tr class="header_tab">
            <td scope="col" class="auteur">Auteur</td>
            <td scope="col" class="date">Commentaire</td>
            <td scope="col" class="date">Signalement</td>
            <td scope="col" class="supp">Suppression</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($comments as $comment) { ?>
        <tr class="btn_modif">
        
        <td><strong><?php echo $comment->author(); ?></strong> le <?php echo $comment->dateComment(); ?></td>
        <td><?php echo $comment->comment() ?></td>
        <td><?php echo $comment->signaler() ?></td>
        <td>
            
            <form action="index.php?action=deleteComment&billet=<?= $_GET['billet'] ?>" method="post">
                <input type="hidden" value="<?= $comment->id(); ?>" name="idComment">
                <input class="btn btn-primary" name="delete" type="submit" value="Supprimer">
            </form>
            
        </td>
        </tr>
        
        <?php } // Fin de la boucle des commentaires?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
