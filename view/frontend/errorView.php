<?php $title = 'Jean Laroche | Blog des écrivains'; ?>

<?php ob_start(); ?>
<?php require('nav.php'); ?>


<div class="container-full">
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('public/img/alaska.webp')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Erreur</h1>
            <span class="subheading">La page n'existe pas</span>
            <br>
            <a href="index.php"><i class="fas fa-home fa-w-16 fa-3x" id="home"></i></a>
          </div>
        </div>
        <!-- Flêche avec effet smoothScroll -->


      </div>
  </header>

</div>

<?= require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>