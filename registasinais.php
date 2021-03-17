<?php
include('config.php');
$medic = LerMedicamntos($db_con);
?>
<form id="formdados">
  <h3>Registar Sinais Vitais</h3>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Utente</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext display-6" id="utente" value="">
      <input type="hidden" id="utenteid" name="utenteid" value="">
    </div>
  </div>



  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">TA</label>
    <div class="col-sm-8">
      <input class="form-control" type="text" id="ta" name="ta">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">FC</label>
    <div class="col-sm-8">
      <input class="form-control" type="text" id="fc" name="fc">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">SPO2</label>
    <div class="col-sm-8">
      <input class="form-control" type="text" id="sp" name="sp">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Glicémia</label>
    <div class="col-sm-8">
      <input class="form-control" type="text" id="gli" name="gli">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Temp.</label>
    <div class="col-sm-8">
      <input class="form-control" type="text" id="temp" name="temp">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Tem dor?</label>

    <div class=" col-sm-8 form-check form-switch">
      <input class="form-check-input form-control" type="checkbox" id="dor" name="dor">
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
function previewFile(input) {
  var file = $("input[type=file]").get(0).files[0];

  if (file) {
    var reader = new FileReader();

    reader.onload = function() {
      $("#previewImage").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}
$(document).ready(function() {
  $('#cancela').click(function() {
    $('#registar').val('0')
    $('#dados').load('sinais.php');
  });

  $('#grava').click(function() {

    let id = $('#utenteid').val()

    /*
        img = $('#formFile').get(0).files[0].name;
        alert(img)
    */


    if (id > 0) {
      $.ajax({
        method: 'GET',
        url: 'sets.php?op=gravasinais&tec=osvaldo',
        dataType: "json",
        processData: false, // tell jQuery not to process the data
        contentType: false,
        enctype: "multipart/form-data",
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
          $('#mensagem').html('<p>Ocorreu um erro.' + erro + '</p>')
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