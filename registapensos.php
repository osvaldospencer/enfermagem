<?php
include('config.php');
$medic = LerMedicamntos($db_con);
?>
<form id="formdados">
  <h3>Registar pensos</h3>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Utente</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="utente" value="">
      <input type="hidden" id="utenteid" name="utenteid" value="">
    </div>
  </div>



  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Descrição</label>
    <div class="col-sm-8">

      <textarea rows="5" class="form-control" cols="14" name="descricao" id="descricao"></textarea>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">&nbsp;</label>
    <div class="col-sm-8">
      <input class="form-control" type="file" id="formFile">
      <div id="preview">
        <img src="filed.png" />
      </div>
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
    $('#dados').load('pensos.php');
  });

  $('#grava').click(function() {

    let id = $('#utenteid').val()
    let med = $('#descricao').val().length




    if (id > 0 && med > 2) {
      $.ajax({
        method: 'GET',
        url: 'sets.php?op=gravapenso&tec=osvaldo',
        data: $('#formdados').serialize(),
        beforeSend: function() {
          $("#mensagem").fadeOut();
          $("#mensagem").html('<img src="images/btn-ajax-loader.gif" /> &nbsp;');
          //$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; a enviar ...');
        },
        success: function(resp) {
          $("#mensagem").fadeIn();
          $('#mensagem').addClass(' alert-success ')
          $('#mensagem').html('<p>Penso registado com sucesso.</p>')
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
        "Existem campos que não foram preenchidas, verifica os seguintes: \n - Nome \n - Descrição"
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