<?php $title = 'Jean Laroche | Blog des écrivains'; ?>
<?php  require('nav.php'); ?>

<div class="container-full">
  <header class="masthead" style="background-image: url('public/img/profil.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>Profil de <?php echo $profil->pseudo(); ?></h2>
            <p>Pseudo : <?php echo $profil->pseudo(); ?></p>
            <p>Email : <?php echo $profil->email(); ?></p>
            <a href="#down" aria-label="Flêche vers le bas" id="arrow">
              <i class="fas fa-arrow-circle-down fa-w-16 fa-3x"></i><br><br>
              <i class="fas fa-tools fa-w-16 fa-3x"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
  </header>
</div>
<?php ob_start(); ?>
<div class="container">
  <div class="table-responsive" id="down">
    <table class="table table-dark">
      <h6 align="center">ATELIER</h6>
      <tbody>
        <tr>
          <th class="tools" scope="row">CRÉER</th>
          <td align="center"><a role="button" href="index.php?action=create" class="btn btn-primary">Nouveau billet</a>
          </td>
          <!-- <td align="center"><a role="button" href="index.php?action=signin" class="btn btn-primary">Nouveau compte</a> -->
          </td>
        </tr>
        <tr>
          <th class="tools" scope="row">ÉDITER</th>
          <td align="center"><a class="btn btn-primary" role="button" href="index.php?action=editBillet">Mes billets</a>
          </td>
          <td align="center"><a class="btn btn-primary" role="button" href="index.php?action=editProfil">Mon profil</a>
          </td>
        </tr>
        <tr>
          <th class="tools" scope="row">MODÉRER</th>
          <td align="center" scope="col"><a role="button" href="index.php?action=editComment"
              class="btn btn-primary">Commentaires</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


<div class="btn_connexion" align='center'>
  <a class="btn btn-primary_mind" role="button" href="index.php?action=listBillet">Retour au blog</a>
  <a class="btn btn-primary_disco" role="button" href="index.php?action=deconnexion">Déconnexion</a>
</div>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>