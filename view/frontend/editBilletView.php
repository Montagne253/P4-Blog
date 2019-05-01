<?php $title = 'ADMIN' ?>
<?php  require('nav.php'); ?>
<?php  require('header.php'); ?>
<?php ob_start(); ?>

<div class="container-fluid">


<table class="table table-hover table-dark">
<thead>
<tr class="header_tab">
        <td scope="col" class="titre">Titre</td>
        <td scope="col" class="auteur">Auteur</td>
        <td scope="col" class="date">Date modification</td>
        <td scope="col" class="modif">Modification</td>
        <td scope="col" class="supp">Suppression</td>
</tr>
</thead>
  <tbody>
    
<?php foreach ($billets as $billet) { ?>
    <tr class="btn_modif">
        <td scope="row"><?php echo $billet->title(); ?></td>
        <td><?php echo $billet->author(); ?></td>
        <td><?php echo $billet->dateModification(); ?></td>
        <td>
            <a class="btn btn-primary" href="index.php?action=edit&billet=<?php echo $billet->id(); ?>">Modifier</a>
        </td>   
        <td>
            <a class="btn btn-primary" href="index.php?action=editBillet&billet=<?php echo $billet->id(); ?>">Supprimer</a>
        </td>
    </tr>
  </tbody>
  
<?php
    } // Fin de la boucle des billets  
?>
       
</div>





<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
         

