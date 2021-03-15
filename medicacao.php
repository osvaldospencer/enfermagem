<?php

include('config.php');
$id = 0;
$nome = "";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
}


$ut = LerMedicacaoId($db_con, $id);
//$tam = count($ut);


?>

<div class="col-12" style="border:2px solid #ccc">

  <h3>Medicações de utente</h3>
  <div>
    <?php
    if ($ut == 0) {
      echo 'Não há registos';
    } else {

    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Medicamento</th>
          <th scope="col">Manhã</th>
          <th scope="col">Almoço</th>
          <th scope="col">Lanche</th>
          <th scope="col">Jantar</th>
          <th scope="col">Deitar</th>
          <th scope="col">Inicio</th>
          <th scope="col">Fim</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $x = 0;
          foreach ($ut as $key => $value) {
            //if ($value['estado'] == 1) {
            $x++;

          ?>
        <tr>
          <th scope="row"><?php echo $x; ?></th>
          <td><?php echo $value['medicamento']; ?></td>
          <td><?php echo $value['manha']; ?></td>
          <td><?php echo $value['almoco']; ?></td>
          <td><?php echo $value['lanche']; ?></td>
          <td><?php echo $value['jantar']; ?></td>
          <td><?php echo $value['deitar']; ?></td>
          <td><?php echo $value['inicio']; ?></td>
          <td><?php echo $value['fim']; ?></td>

        </tr>
        <?php
            //}
          }
        }
        ?>

      </tbody>

    </table>
  </div>


</div>




<script>
$(document).ready(function() {
  $('button').click(function() {
    $('#dados2').load($(this).attr('name') + '.php');
  });




});
</script>