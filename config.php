<?php

include('dbconfig.php');


function LerUtentes($db_con, $val, $nome)
{

  $query = "";
  if ($val > 0) {


    $stmt = $db_con->query("SELECT * FROM utente where ativo = 1 and val=$val order by nome asc");
    $vals = $stmt->fetchAll();
    $valsnum = $stmt->rowCount();
    if ($valsnum > 0) {
      return $vals;
    } else {
      return "[]";
    }
  } elseif ($nome != "") {


    $stmt = $db_con->query("SELECT * FROM utente where nome like '$nome%'");
    $vals = $stmt->fetchAll();
    $valsnum = $stmt->rowCount();
    if ($valsnum > 0) {
      return $vals;
    } else {
      return "[]";
    }
  } else {


    $stmt = $db_con->query("SELECT * FROM utente where ativo = 1 order by nome asc");
    $vals = $stmt->fetchAll();
    $valsnum = $stmt->rowCount();
    if ($valsnum > 0) {
      return $vals;
    } else {
      return "[]";
    }
  }
}

function LerUtentesId($db_con, $id)
{
  $stmt = $db_con->query("SELECT * FROM utente where id=$id ");
  $vals = $stmt->fetchAll();
  $valsnum = $stmt->rowCount();
  if ($valsnum > 0) {
    return $vals;
  } else {
    return 0;
  }
}


function LerMedicacaoId($db_con, $id)
{
  $stmt = $db_con->query("SELECT * FROM medicacao where idutente=$id order by inicio desc ");
  $vals = $stmt->fetchAll();
  $valsnum = $stmt->rowCount();
  if ($valsnum > 0) {
    return $vals;
  } else {
    return 0;
  }
}

function LerPensosId($db_con, $id)
{
  $stmt = $db_con->query("SELECT * FROM pensos where idutente=$id ");
  $vals = $stmt->fetchAll();
  $valsnum = $stmt->rowCount();
  if ($valsnum > 0) {
    return $vals;
  } else {
    return 0;
  }
}


function LerSinaisId($db_con, $id)
{
  $stmt = $db_con->query("SELECT * FROM sinais where idutente=$id ");
  $vals = $stmt->fetchAll();
  $valsnum = $stmt->rowCount();
  if ($valsnum > 0) {
    return $vals;
  } else {
    return 0;
  }
}


function LerMedicamntos($db_con)
{
  $stmt = $db_con->query("SELECT * FROM medicamentos order by nome asc");
  $vals = $stmt->fetchAll();
  $valsnum = $stmt->rowCount();
  if ($valsnum > 0) {
    return $vals;
  } else {
    return 0;
  }
}



?>