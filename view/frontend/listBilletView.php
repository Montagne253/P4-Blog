<?php $title = 'Jean Laroche | Blog des écrivains'; ?>



<?php require('nav.php'); ?>


<div class="container-full">
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('public/img/alaska.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
          <h1>Un billet simple pour l'Alaska</h1>
            <span class="subheading">Voici mon blog, chaque semaine je vous présenterai un nouvau billet sur mon périple en Alaska</span>
            <a href="#down" aria-label="Flêche vers le bas" ><i class="fas fa-arrow-circle-down fa-w-16 fa-3x" id="arrow"></i></a>
          </div>
        </div>
        <!-- Flêche avec effet smoothScroll -->
	
			
    </div>
  </header>

</div>
<?php ob_start(); ?>

<?php foreach ($billets as $billet) { 
    $content = $billet->content();
    $resumeContent = substr($content, 0, 50);
    
?>

  <!-- Main Content -->
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
            </h5>
         
          <p class="post-meta">
            <a href="index.php?action=about"><?= $billet->author() ?></a>
            <?= $billet->dateCreation() ?>
          </p>
        </div>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="index.php?action=billet&billet=<?= $billet->id(); ?>">Lire le billet &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <hr>
<?php
}

?>

<?= require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>