<?php $title = 'Billets' ?>

<?php ob_start(); ?>

<?php require('nav.php'); ?>



<div class="container-full">
  <header class="masthead" style="background-image: url('public/img/jean.webp')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Jean Forteroche</h1>
            <span class="subheading">Aliquam convallis sollicitudin purus. Praesent aliquam, enim at fermentum mollis,
              ligula massa adipiscing nisl.</span>
            <br>
            <a href="index.php"><i class="fas fa-home fa-w-16 fa-3x" id="home"></i></a>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
<div class="container">


  <h3>Biographie</h3>

  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit
    amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper
    congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl
    sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue.
    Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent
    blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci
    luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas
    adipiscing ante non diam sodales hendrerit.</p>

  <h3>Mes romans</h3>
  <dl>
    <dt><dfn>Westeros,</dfn></dt>
    <dd>Editis, 2002</dd>
    <dt><dfn>Baratheon,</dfn></dt>
    <dd>Editis, 2004</dd>
    <dt><dfn>Essos,</dfn></dt>
    <dd>Editis, 2008</dd>
    <dt><dfn>Targaryen,</dfn></dt>
    <dd>Editis, 2012</dd>
    <dt><dfn>L'hiver arrive,</dfn></dt>
    <dd>Editis, 2016</dd>
  </dl>

  </section>
  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>
  </body>

  </html>

  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>