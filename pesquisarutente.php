<?php

include('config.php');
$id = 0;
$nome = "";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

if (isset($_GET['nome'])) {
  $nome = $_GET['nome'];
}

$ut = LerUtentes($db_con, $id, $nome);
$tam = count($ut);

function Idade($data)
{

  $date = new DateTime($data);
  $interval = $date->diff(new DateTime(date('Y-m-d')));
  echo $interval->format('%Y anos');
}

?>

<div class="d-flex flex-column justify-content-center sm-12 md-4 lg-4 overflow-auto" id="dados2">
  <div class=" mx-auto ">

    <h3 class="display-6 fw-normal">Lista de Utentes</h3>

    <?php

    $val = ["1" => "S. Domingos", "2" => "S. José", "3" => "C Dia", "4" => "SAD"];
    ?>

    <div class="row-cols-1 "
      style="display:flex; flex-direction:row;  justify-content: space-around;   padding-top:5px; ">
      <?php
      if ($tam > 0) {        
        foreach ($ut as $key => $value) {
          if ($estilo == 0) {
      ?>
      <a href="#" class="btn  " id="nomes" data="<?php echo $value['id']; ?>" name="<?php echo $value['nome']; ?>"
        style="width: 110px;">
        <div class="shadow  mb-1 bg-body rounded" style="width:100%; border:1px solid #000; ">
          <img src="images/user.jpg" alt="..." class="rounded-circle z-depth-4" data-holder-rendered="true"
            width="60px">
          <p class=""><?php echo $value['nome']; ?></p>
        </div>
      </a>

      <?php
          } else {

            $nom = explode(' ',$value['nome']);
            $t = count($nom);
            
            $n="";
            if ($t > 1) {
              $nomes = $nom[0];
              //$t = strlen($nom);
              $apel = $nom[$t-1];
              $nom2 = "";
              if (strtoupper($nomes)=="MARIA") {
                $nom2 =  $nom[1];
                $n = "".$nomes." ".$nom2." ".$apel;
              }else {
                $n = "".$nomes." ".$apel;
              }
            }else {
              $n = "".$nom;
            }
            
            


          ?>
      <a href="#" class="btn " style="width: 110px;" id="nomes" data="<?php echo $value['id']; ?>"
        name="<?php echo $value['nome']; ?>">
        <div class="shadow  mb-1 bg-body rounded" style="width:100%; border:1px solid #000; ">
          <p class=""><?php echo $n; ?></p>
        </div>
      </a>
      <?php
          }
        }

        //sendMail("Próximas Consultas de Utentes",$mensagem);
      } else {
        echo "[]";
      }
      ?>
    </div>


  </div>

</div>


<script>
$(document).ready(function() {
  $('button').click(function() {
    $('#dados2').load($(this).attr('name') + '.php');
  });

  $('a#inf').click(function() {

    $('#dados').load('utente.php?id=' + $(this).attr('data'));
  });
});
</script>

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