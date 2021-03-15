<?php

include('config.php');


$ut = LerUtentes($db_con, 0, "");
$tam = count($ut);
$estilo = 0;

if (isset($_GET['estilo'])) {
  $estilo = $_GET['estilo'];
}

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
    José</button><button type="button" class="btn btn-success" id="3">C Dia</button>
  <input type="text" name="" value="" id="nome">
  <input type="hidden" id="estil" value="">
  <input type="hidden" id="registar" value="">
</div>
<div class="d-flex flex-row justify-content-lg-between col-4 py-3">
  <div>
    <a href="#" id="linha" class=" list-group-horizontal" rel="noopener noreferrer">
      <img src="images/row.png" alt="" srcset="" width="30px">
    </a> &nbsp;
    <a href="#" id="coluna" class=" list-group-horizontal" rel="noopener noreferrer">
      <img src="images/column.png" alt="" srcset="" width="30px">
    </a>
  </div>
  <div class="d-flex ">
    <a href="#" id="novo" class=" list-group-horizontal" rel="noopener noreferrer">
      <img src="images/add.jpg" alt="" srcset="" width="30px">
    </a>
  </div>

</div>

<div class="row d-flex flex-row py-3 ">


  <div class="col-4 d-flex flex-column justify-content-center " style="border:2px solid #ccc" id="dados2_">
    <div class=" p-lg-5 mx-auto ">

      <h5 class="display-6 fw-normal">Lista de Utentes</h5>

      <?php

      $val = ["1" => "S. Domingos", "2" => "S. José", "3" => "C Dia", "4" => "SAD"];
      ?>

      <div class="row-cols-1 "
        style="display:flex; flex-direction:row; flex-wrap: wrap; justify-content: space-around;   padding-top:2px">
        <?php
        if ($tam > 0) {


          foreach ($ut as $key => $value) {
            if ($estilo == 0) {
              # code...


        ?>

        <a href="#" class="btn btn-outline-info" id="nomes" data="<?php echo $value['id']; ?>"
          name="<?php echo $value['nome']; ?>" style="width: 50%;">
          <div class="shadow p-3 mb-1 bg-body rounded" style="width:100%; border:1px solid #000; ">
            <img src="images/user.jpg" alt="..." class="rounded-circle z-depth-4" style="border: 1px solid #ccc"
              data-holder-rendered="true" width="80%">
            <p class=""><?php echo $value['nome']; ?></p>
          </div>
        </a>






        <?php
            } else {
            ?>
        <a href="#" class="btn btn-outline-info" id="nomes" data="<?php echo $value['id']; ?>"
          name="<?php echo $value['nome']; ?>" style="width: 100%;">
          <div class="shadow p-3 mb-1 bg-body rounded" style="width:100%; border:1px solid #000; ">
            <p class=""><?php echo $value['nome']; ?></p>
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
  <div class="col-8 py-2" id="infmed">
    <p>Esta área é destina-se às medicações.</p>
    <p>Pode consultar medicações de cada utente, escolhendo o utente do lado esquerdo.</p>
    <p>Para adicionar medicamentos a um utente clica no botão +</p>
  </div>
</div>



<script>
$(document).ready(function() {
  $('button').click(function() {
    $('#dados2_').load('pesquisarutente2.php?id=' + $(this).attr('id') + '&estilo=' + $('#estil').val());
  });

  $('#nome').keyup(function() {
    $('#dados2_').load('pesquisarutente2.php?nome=' + $(this).val() + '&estilo=' + $('#estil').val());
  });

  $('a#inf').click(function() {

    $('#dados').load('utente.php?id=' + $(this).attr('data'));
  });

  $('#linha').click(function() {

    $('#estil').val('1')
    $('#dados2_').load('pesquisarutente2.php?nome=' + $(this).val() + '&estilo=1');
  });

  $('#coluna').click(function() {

    $('#estil').val('0')
    $('#dados2_').load('pesquisarutente2.php?nome=' + $(this).val() + '&estilo=0');
  });

  $('#novo').click(function() {
    $('#registar').val('1')
    $('#infmed').load('registamedicacao.php');
  });

  $('a#nomes').click(function() {
    let ti = $('#registar').val()
    if (ti == 1) {
      $('#utente').val($(this).attr('name'))
      $('#utenteid').val($(this).attr('data'))
    } else {

      var n = {
        nome: '',
        id: 0
      }
      n.nome = $(this).attr('name');
      $('#infmed').load('medicacao.php?id=' + $(this).attr('data'));

    }

  });






});
</script>