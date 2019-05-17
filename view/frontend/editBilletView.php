<?php $title = 'ADMIN' ?>

<?php ob_start(); ?>

<?php  require('nav.php'); ?>
<?php  require('header.php'); ?>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead>
                <tr class="header_tab">
                    <td scope="col" class="titre">Titre</td>
                    <td scope="col" class="auteur">Auteur</td>
                    <td scope="col" >Date modification</td>
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
                        <a class="btn btn-primary_mod"
                            href="index.php?action=edit&billet=<?php echo $billet->id(); ?>">Modifier</a>
                    </td>
                    <td>
                        <a class="btn btn-primary_delete"
                            href="index.php?action=editBillet&billet=<?php echo $billet->id(); ?>">Supprimer</a>
                    </td>
                </tr>
            </tbody>

<?php }  ?>

    </div>
</div>





<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>