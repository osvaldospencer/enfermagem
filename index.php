<?php

?>

<!doctype html>
<html lang="pt_PT">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Santa Casa Misericórdia de Castanheira de Pera">
  <meta name="generator" content="SCMCP 0.80.0">
  <title>Registo enfermagem</title>





  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Favicons 
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">-->
  <meta name="theme-color" content="#7952b3">


  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/product.css" rel="stylesheet">
</head>

<body>

  <header class="site-header sticky-top py-1 align-middle ">
    <nav class="container d-flex flex-column flex-md-row justify-content-between align-middle ">
      <a class="py-2" href="#" aria-label="Product">
        <img src="images/logo.png" alt="" class="d-block mb-2 mx-auto d-block" role="img" width="50px" />
      </a>
      <a class="py-2 d-none d-md-inline-block" name="utentes" href="#">Utentes</a>
      <a class="py-2 d-none d-md-inline-block" name="medicacoes" href="#">Medicação</a>
      <a class="py-2 d-none d-md-inline-block" name="pensos" href="#">Pensos</a>
      <a class="py-2 d-none d-md-inline-block" name="sinais" href="#">Sinais vitais</a>
      <a class="py-2 d-none d-md-inline-block" name="notas" href="#">Notas enfermagem</a>
      <a class="py-2 d-none d-md-inline-block" name="diario" href="#">Diário clinico</a>

    </nav>
  </header>

  <main>
    <div class="position-relative overflow-hidden p-3 p-md-1 m-md-3 text-center bg-light dados" id="dados">
      <div class="col-md-5 p-lg-5 mx-auto my-1">
        <h1 class="display-4 fw-normal">Registos de utentes</h1>
        <p class="lead fw-normal">Bem-vindo à app de registo de dados clinicos de utentes.</p>
        <a class="btn btn-outline-secondary" href="#">Coming soon</a>
      </div>
      <div class="product-device shadow-sm d-none d-md-block"></div>
      <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <!--
    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
      <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
    </div>
    -->
  </main>

  <footer class="row py-2 sticky-bottom  bg-success text-center">
    <div class="row text-center">
      <div class="col-12 text-center con">
        <img src="images/logo.png" alt="" class="d-block mb-2 mx-auto d-block" role="img" width="50px" />

        <small class="d-block mb-3 text-white ">Todos os direitos reservados a Santa Casa da Misericórdia de
          Castanheira
          de Pera &copy; 2021</small>
      </div>

    </div>
  </footer>


  <script src="js/bootstrap.bundle.min.js">
  </script>

  <script src="js/jquery-3.6.0.min.js"></script>




</body>

</html>
<script>
$(document).ready(function() {
  $('a').click(function() {
    $('#dados').load($(this).attr('name') + '.php');
  });


});
</script>
</div>


</body>

</html>