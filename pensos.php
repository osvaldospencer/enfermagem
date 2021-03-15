<?php

include('config.php');
$id = 0;
$nome = "";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
}


$ut = LerPensosId($db_con, $id);




?>

<div class="col-12" style="border:2px solid #ccc">

  <h3>Pensos de utente</h3>
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
          <th scope="col">Data</th>
          <th scope="col">Hora</th>
          <th scope="col">Penso</th>

          <th scope="col">por</th>
          <th scope="col">&nbsp;</th>

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
          <td><?php echo $value['data']; ?></td>
          <td><?php echo $value['hora']; ?></td>
          <td><?php echo $value['penso']; ?></td>

          <td><?php echo $value['tecnico']; ?></td>
          <td><img src="<?php echo $value['foto']; ?>" alt="" srcset=""> </td>


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