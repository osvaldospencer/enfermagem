<?php

include('config.php');
$id = 0;
$nome = "";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$ut = LerSinaisId($db_con, $id);
//$tam = count($ut);

$ut_ = LerUtentesId($db_con, $id);

?>

<div class="col-12 d-flex flex-column mx-auto">

  <h4>Sinais vitais de utente - <?php echo $ut_[0]['nome']; ?> </h4>
  <div class="overflow-auto">
    <?php

    if ($ut == 0) {
      echo 'Não há registos';
    } else {

    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Data</th>
          <th scope="col">Hora</th>
          <th scope="col">TA</th>
          <th scope="col">FC</th>
          <th scope="col">SPO2</th>
          <th scope="col">Glic.</th>
          <th scope="col">Temp.</th>
          <th scope="col">Dor</th>
          <th scope="col">Por</th>

        </tr>
      </thead>
      <tbody>

        <?php
          $x = 0;
          

          foreach ($ut as $key => $value) {
            //if ($value['estado'] == 1) {
          ?>
        <tr>
          <th scope="row"><?php echo $x; ?></th>
          <td><?php echo $value['dia']; ?></td>
          <td><?php echo $value['hora']; ?></td>
          <td><?php echo $value['ta']; ?></td>
          <td><?php echo $value['fc']; ?></td>
          <td><?php echo $value['sat']; ?></td>
          <td><?php echo $value['gli']; ?></td>
          <td><?php echo $value['temp']; ?></td>
          <td><?php echo $value['dor']; ?></td>
          <td><?php echo $value['tecnico']; ?></td>


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
  /*
  $('button').click(function() {
    $('#dados2').load($(this).attr('name') + '.php');
  });

*/


});
</script>