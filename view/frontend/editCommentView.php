<?php $title = 'ADMIN' ?>
<?php $header = require('header.php'); ?>
<?php ob_start(); ?>


<div class="container-fluid">


<table class="table table-hover table-dark">

<thead>
    <tr class="header_tab">
        <td scope="col" >Titre</td>
        <td scope="col" >Date</td>
        <td scope="col" >Auteur</td>
        <td scope="col" >Billet</td>
        <td></td>
    </tr>
</thead>
<tbody>
    
<?php
foreach ($billets as $billet) {
    //while ($donnees = $req->fetch())?>


    <tr>
        <td scope="row"><?= $billet->title() ?></td>
        <td><?= $billet->dateCreation() ?></td>
        <td><?= $billet->author() ?></td>
        <td>
        <?= $resumeComment = $billet->content() ?>...
        </td>
          
        <td>
        <em><a class="btn btn-primary" href="index.php?action=deleteComment&billet=<?php echo $billet->id(); ?>">Modérer commentaires</a></em>
        </td>
    </tr>
  </tbody>

  
<?php
    } // Fin de la boucle des billets
          
    
?>
       
     

</div>






<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?> 
         

