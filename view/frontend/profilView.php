<?php $title = 'Jean Laroche | Blog des écrivains'; ?>
<?php $header = require('header.php'); ?>
<?php ob_start(); ?>



<div class="container-fluid" align="center">
    <h2>Profil de <?php echo $profil->pseudo(); ?></h2>

    <br> <br>

    <p>Pseudo : <?php echo $profil->pseudo(); ?></p>

    <br>

    <p>Email : <?php echo $profil->email(); ?></p>

    <br>
    
    <div class="container">
    <table class="table table-dark">
    <h6>ATELIER</h6>
      <tbody>
        <tr>
          <th class="creer" scope="row">CRÉER</th>
          <td><a role="button" href="index.php?action=create" class="btn btn-primary">Nouveau billet</a></td>
          <td><a role="button" href="index.php?action=signin" class="btn btn-primary">Nouveau compte</a></td>
        </tr>
        <tr>
          <th class="editer" scope="row">ÉDITER</th>
          <td><a class="btn btn-primary" role="button" href="index.php?action=editBillet">Mes billets</a></td>
          <td><a class="btn btn-primary" role="button" href="index.php?action=editProfil">Mon profil</a></td>
        </tr>
        <tr>
          <th class="creer" scope="row">MODÉRER</th>
          <td scope="col"><a role="button" href="index.php?action=editComment" class="btn btn-primary">Commentaires</a></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="btn_connexion" align='center'>
    <a class="btn btn-primary" role="button" href="index.php?action=listBillet">Retour au blog</a>
    <a class="btn btn-primary" role="button" href="index.php?action=deconnexion">Déconnexion</a>
  </div>
  <div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right"><a href="index.php?action=mention">À propos</a> &nbsp; © Tous droits réservés - 2019 - Montagné<sup>TM</sup></p>
        <br><br>
        </div>
    </div>
</div>
<br>
<br>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>

