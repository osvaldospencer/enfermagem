<?php

include('config.php');
$id = 0;
$nome = "";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$ut = LerPensosId($db_con, $id);
//$tam = count($ut);

$ut_ = LerUtentesId($db_con, $id);

?>

<div class="col-12 d-flex flex-column mx-auto">

  <h4>Pensos de utente - <?php echo $ut_[0]['nome']; ?> </h4>
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
          <th scope="col">Descrição</th>
          <th scope="col"></th>
          <th scope="col">Por</th>

        </tr>
      </thead>
      <tbody>

        <?php
          $x = 0;
          if (file_exists('temp')) {
            $objects = scandir('temp');
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {                    
                            unlink("temp/" . $object);                       

                    
                }
            }
            reset($objects);
          }

          foreach ($ut as $key => $value) {
            //if ($value['estado'] == 1) {
            $x++;
            $data = base64_decode($value['foto']);
            $file = "temp/image".$x.".jpg";
            $success = file_put_contents($file, $data);

          ?>
        <tr>
          <th scope="row"><?php echo $x; ?></th>
          <td><?php echo $value['dia']; ?></td>
          <td><?php echo $value['hora']; ?></td>
          <td><?php echo $value['penso']; ?></td>
          <td> <a href="<?php echo $file; ?>" data-lightbox="roadtrip"> <img src="<?php echo $file; ?>" width="50px" />
            </a>
          </td>
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