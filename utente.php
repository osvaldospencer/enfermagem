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

$ut = LerUtentesId($db_con, $id);
$tam = count($ut);

function Idade($data)
{

  $date = new DateTime($data);
  $interval = $date->diff(new DateTime(date('Y-m-d')));
  echo $interval->format('%Y anos');
}

?>

<div class="row d-flex flex-row py-3 ">
  <div class="col-3 d-flex flex-column justify-content-center " style="border:2px solid #ccc">
    <img src="images/user.jpg" class="rounded-circle d-block z-depth-4 mt-3 mb-5 mx-auto" alt="" width="50%">

    <a href="#" class="card-link m-1 btn btn-info " id="infutente" name="utente" data="<?php echo $id; ?>">Dados</a>
    <a href="#" class="card-link m-1 btn btn-info " id="inf" name="medicacao" data="<?php echo $id; ?>">Medicação</a>
    <a href="#" class="card-link m-1 btn btn-info " id="inf" name="pensos" data="<?php echo $id; ?>">Pensos</a>
    <a href="#" class="card-link m-1 btn btn-info " id="inf" name="sinais" data="<?php echo $id; ?>">Sinais Vitais</a>



  </div>
  <div class="col-9 py-2" id="infut">

    <h3>Informações de utente</h3>
    <div>
      <div class=" d-flex flex-row flex-wrap ">
        <span class="fw-bold">Nome:</span> &nbsp;&nbsp;&nbsp;&nbsp;
        <p class=" fs-4"><?php echo $ut[0]['nome']; ?></p>
      </div>
      <div class=" d-flex flex-row flex-wrap ">
        <span class="fw-bold">Data Nasc:</span> &nbsp;&nbsp;&nbsp;&nbsp;
        <p class=" fs-4"><?php echo $ut[0]['nasc'];
                          echo ' (';
                          Idade($ut[0]['nasc']);
                          echo ' )'; ?></p>
      </div>
      <div class=" d-flex flex-row flex-wrap ">
        <span class="fw-bold">Lanificios:</span> &nbsp;&nbsp;&nbsp;&nbsp;
        <p class=" fs-4"><?php echo ($ut[0]['lanif'] == 1) ? 'Sim' : 'Não'; ?></p>
      </div>
      <div class=" d-flex flex-row flex-wrap ">
        <span class="fw-bold">ERPI:</span> &nbsp;&nbsp;&nbsp;&nbsp;
        <p class=" fs-4">
          <?php $val = ["1" => "S. Domingos", "2" => "S. José", "3" => "Centro de Dia", "4" => "SAD"];
          echo $val[$ut[0]['val']]; ?>
        </p>
      </div>

      <div class=" d-flex flex-row flex-wrap ">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <h5>Antecedentes</h5>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                dados de saúde pasados anos sem medicação
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5> Alergias</h5>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                - ASmas
                - Nariz
                - Olhos
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>


</div>




<script>
$(document).ready(function() {
  $('a#inf').click(function() {

    $('#infut').load($(this).attr('name') + '.php?id=' + $(this).attr('data'));
  });

  $('a#infutente').click(function() {

    $('#dados').load($(this).attr('name') + '.php?id=' + $(this).attr('data'));
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