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
            <h1>Un billet simple pour l'Alaska</h1>
            <br>
            <span class="subheading">Voici mon blog, chaque semaine je vous présenterai un nouvau billet de mon roman
              inspiré de mon périple
              en Alaska</span>
            <br>
            <a href="#down" aria-label="Flêche vers le bas"><i class="fas fa-arrow-circle-down fa-w-16 fa-3x"
                id="arrow"></i></a>
          </div>
        </div>
        <!-- Flêche avec effet smoothScroll -->


      </div>
  </header>

</div>

<?php foreach ($billets as $billet) {

    $content = $billet->content();
    $resumeContent = substr($content, 0, 200);
    
?>

<!-- Main Content -->
<div class="container" id="down">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="post-preview">
        <a href="index.php?action=billet&billet=<?= $billet->id(); ?>">
          <h2 class="post-title">
            <?= $billet->title()  ?>
          </h2>
        </a>
        <p class="post-subtitle">
          <?= $resumeContent; ?>...
        </p>

        <p class="post-meta">
          <a href="index.php?action=about"><?= $billet->author() ?></a>
          <?= $billet->dateCreation() ?>
        </p>
      </div>
      <hr>
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="index.php?action=billet&billet=<?= $billet->id(); ?>">Lire la
          suite &rarr;</a>
      </div>
    </div>
  </div>
</div>

<hr>
<hr>
<?php
}

?>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>