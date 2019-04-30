<?php $title = 'ADMIN' ?>
<?php $header = require('header.php'); ?>
<?php ob_start(); ?>
    <div align="center">
        <h2>Modifier votre billet</h2>
        <br>
        <br>
        <br>
        <?php 
        if(isset($error))
        {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>
        <br>
        <br>

        <form method="POST" action="index.php?action=edit&billet=<?= $billet->id(); ?>">
            <input type="text" name="newauthor" placeholder="" value="<?=  $billet->author(); ?>"><br><br><br>
            <textarea class="story" type="text" id="title" name="newtitle" rows="3" cols="110" placeholder="Titre..."><?=  $billet->title(); ?></textarea><br><br><br>
            <textarea class="story" type="text" id="mytextarea" name="newcontent" rows="50" cols="140" placeholder=""><?=  $billet->content(); ?></textarea><br>
            
            <br><br><br>
            <input  class="btn_submit_edit" type="submit" name="edit" value="Modifier">
            
        </form>
</div>
        <br>
        <br>
    <div class="btn_edit">
    <a class="btn btn-primary" href="index.php?action=editBillet">Mes billets</a>
    <a class="btn btn-primary" href="index.php?action=profil&id=<?$_SESSION['id']?>">Admin</a>
    <a class="btn btn-primary" href="index.php?action=deconnexion">Se deconnecter</a>
    </div>

    

        <?php 
        if(isset($error))
        {
            echo '<font color="white">' . $error . "</font>";
        }
        ?>
    
    

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
