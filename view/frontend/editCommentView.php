<?php $title = 'ADMIN' ?>
<?php  require('nav.php'); ?>
<?php  require('header.php'); ?>
<?php ob_start(); ?>

<div class="container">

    <div class="table-responsive">
        <table class="table table-hover table-dark">

            <thead>
                <tr class="header_tab">
                    <td scope="col">Titre</td>
                    <td scope="col">Date</td>
                    <td scope="col">Auteur</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($billets as $billet) {
    $content = $billet->content();
    $resumeContent = substr($content, 0, 50);
?>
                <tr>
                    <td scope="row"><?= $billet->title() ?></td>
                    <td><?= $billet->dateCreation() ?></td>
                    <td><?= $billet->author() ?></td>
                    <td>
                        <em><a class="btn btn-primary_mod"
                                href="index.php?action=deleteComment&billet=<?php echo $billet->id(); ?>">Modérer
                                commentaires</a></em>
                    </td>
                </tr>
            </tbody>

            <?php } // Fin de la boucle des billets?>

        </table>

    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>