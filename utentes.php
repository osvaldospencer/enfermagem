<?php

include('config.php');


$ut = LerUtentes($db_con, 0, "");
$tam = count($ut);

function Idade($data)
{

  $date = new DateTime($data);
  $interval = $date->diff(new DateTime(date('Y-m-d')));
  echo $interval->format('%Y anos');
}

?>
<div class="col-6 "
  style="display:flex; flex-direction:row; flex-wrap: wrap; align-items: center; justify-content: space-around;">
  <button type="button" class="btn btn-success" id="1">S. Domingos</button><button type="button" class="btn btn-success"
    id="2">S.
    José</button><button type="button" class="btn btn-success" id="3">C Dia</button><button type="button"
    class="btn btn-success" id="4">SAD</button>
  <input type="text" name="" value="" id="nome">
</div>


<div class="position-relative overflow-hidden  text-center bg-light " id="dados2">
  <div class=" p-lg-5 mx-auto ">

    <h3 class="display-6 fw-normal">Lista de Utentes</h3>

    <?php

    $val = ["1" => "S. Domingos", "2" => "S. José", "3" => "C Dia", "4" => "SAD"];
    ?>

    <div class="row-cols-1 "
      style="display:flex; flex-direction:row; flex-wrap: wrap; justify-content: space-around;   padding-top:5px">
      <?php
      if ($tam > 0) {


        foreach ($ut as $key => $value) {

      ?>


      <div class="shadow p-3 mb-5 bg-body rounded" style="width:250px; border:1px solid #000; ">
        <img src="images/user.jpg" alt="..." class="rounded-circle z-depth-4" style="border: 1px solid #ccc"
          data-holder-rendered="true" width="40%">
        <div class="card-body">
          <h5 class="card-title"><?php echo $value['nome']; ?></h5>
          <p class="card-text"></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?php echo $val[$value['val']]; ?></li>
          <li class="list-group-item"><?php echo $value['nasc'] . ' (';
                                          Idade($value['nasc']);
                                          echo ')'; ?></li>
          <li class="list-group-item"><?php echo ($value['lanif'] == 1) ? 'Lanificios' : ''; ?></li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Editar</a>
          <a href="#" class="card-link" id="inf" data="<?php echo $value['id']; ?>" name="ut">+ info</a>
        </div>
      </div>






      <?php



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
    $('#dados2').load('pesquisarutente.php?id=' + $(this).attr('id'));
  });

  $('#nome').keyup(function() {
    $('#dados2').load('pesquisarutente.php?nome=' + $(this).val());
  });

  $('a#inf').click(function() {

    $('#dados').load('utente.php?id=' + $(this).attr('data'));
  });


});
</script>