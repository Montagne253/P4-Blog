<?php $title = 'Jean Laroche | Blog des écrivains'; ?>

<?php ob_start(); ?>

<?php require('nav.php'); ?>


<div class="container-full">
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('public/img/alasky.webp')">
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
      </div>
  </header>

</div>

<?php foreach ($billets as $billet) { 
    $content = $billet->content();
    $resumeContent = substr($content, 0, 50);
    
?>


<div class="container" id="down">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            <?= $billet->title()  ?>
          </h2>
        </a>
        <h3 class="post-subtitle">
        </h3>
        <p class="post-meta">
          <a href="index.php?action=about"><?= $billet->author() ?></a>
          le <?= $billet->dateCreation() ?>
        </p>
      </div>
      <hr>
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="index.php?action=billet&billet=<?= $billet->id(); ?>">Lire le
          billet &rarr;</a>
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