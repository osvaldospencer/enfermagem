<?php
include('config.php');
$medic = LerMedicamntos($db_con);
?>
<form id="formdados">
  <h3>Registar medicação</h3>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Utente</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="utente" value="">
      <input type="hidden" id="utenteid" name="utenteid" value="">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">&nbsp;</label>
    <div class="col-sm-4">
      <select class="form-control" id="meds">
        <option value="0">Medicamento</option>
        <?php
                foreach ($medic as $key => $value) {
                    ?>
        <option value="<?php echo $value['nome']; ?>"><?php echo $value['nome']; ?></option>

        <?php
                }

            ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Medicação</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="medicamento" name="medicamento" value="">
    </div>
    <div class="col-sm-2">
      <a href="#" id="gravamedic" class="btn btn-warning form-control  ">gravar medic.</a>
    </div>

  </div>


  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Manhã</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="manha" name="manha">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Almoço</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="almoco" name="almoco">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Lanche</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="lanche" name="lanche">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Jantar</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jantar" name="jantar">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Deitar</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="deitar" name="deitar">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Inicio</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" id="inicio" name="inicio">
    </div>
    <label for="inputPassword" class="col-sm-2 col-form-label">Fim</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" id="fim" name="fim">
    </div>
  </div>
</form>
<div class="mb-3 row">
  <label for="staticEmail" class="col-sm-2 col-form-label">&nbsp;</label>
  <div class="col-sm-2">
    <a href="#" id="grava" class="btn btn-success form-control  ">Gravar</a>
  </div>
  <div class="col-sm-2">
    <a href="#" id="cancela" class="btn btn-danger form-control  ">Cancelar</a>
  </div>
</div>

<div class="alert " id="mensagem">

</div>

<script>
$(document).ready(function() {
  $('#cancela').click(function() {
    $('#registar').val('0')
    $('#dados').load('medicacoes.php');
  });

  $('#grava').click(function() {

    let id = $('#utenteid').val()
    let med = $('#medicamento').val().length
    let manha = $('#manha').val().length
    let almoco = $('#almoco').val().length
    let lanche = $('#lanche').val().length
    let jantar = $('#jantar').val().length
    let deitar = $('#deitar').val().length
    let inicio = $('#inicio').val().length

    if (id > 0 && med > 2 && inicio > 0 && (manha > 0 || almoco > 0 || lanche > 0 || jantar > 0 || deitar >
        0)) {
      $.ajax({
        method: 'GET',
        url: 'sets.php?op=gravamedicut',
        data: $('#formdados').serialize(),
        beforeSend: function() {
          $("#mensagem").fadeOut();
          $("#mensagem").html('<img src="images/btn-ajax-loader.gif" /> &nbsp;');
          //$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; a enviar ...');
        },
        success: function(resp) {
          $("#mensagem").fadeIn();
          $('#mensagem').addClass(' alert-success ')
          $('#mensagem').html('<p>Medicação registado com sucesso.</p>')
          setTimeout('$("#mensagem").html("")', 8000);
        },

        error: function(erro) {
          $("#mensagem").fadeIn();
          $('#mensagem').addClass(' alert-danger')
          $('#mensagem').html('<p>Ocorreu um erro.</p>')
        }
      })
    } else {
      alert(
        "Existem campos que não foram preenchidas, verifica os seguintes: \n - Nome \n - Medicação \n - Data de inicio \n - Pelo menos um dos periodos"
      )

    }



  });

  $('#meds').change(function() {

    $('#medicamento').val($(this).val())
  });


  $('#gravamedic').click(function() {


    let med = $('#medicamento').val()
    dados = 'nome=' + med;

    if (med.length > 0) {
      $.ajax({
        method: 'GET',
        url: 'sets.php?op=gravamedic&nome=' + med,
        data: dados,
        data: $('#formdados').serialize(),
        beforeSend: function() {

          $("a#gravamedic").text('a gravar . . .');
          //$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; a enviar ...');
        },
        success: function(resp) {


          $('a#gravamedic').text('OK')
          setTimeout('$("#gravamedic").html("gravar medic.")', 5000);
        },

        error: function(erro) {

          $('a#gravamedic').text('erro')
        }
      })
    } else {
      alert(
        "Tem de preencher o campo medicamento"
      )

    }



  });

})
</script>