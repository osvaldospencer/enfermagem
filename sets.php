<?php

include('dbconfig.php');


$op = "";
if (isset($_GET['op'])) {
  $op = $_GET['op'];
}

if ($op=="gravamedicut") { 
  $dados = array();
  //parse_str($_GET['data'], $dados);
  
  //print_r($_GET);


            array_push($dados, $_GET['utenteid']);
            array_push($dados, $_GET['medicamento']);
            array_push($dados, $_GET['manha']);
            array_push($dados, $_GET['almoco']);
			array_push($dados, $_GET['lanche']);
			array_push($dados, $_GET['jantar']);
      array_push($dados, $_GET['deitar']);
      array_push($dados, $_GET['inicio']);
      array_push($dados, $_GET['fim']);
    
      print_r($dados);

      try {
        $statement = $db_con->prepare("INSERT INTO medicacao (idutente,medicamento,manha,almoco, lanche, jantar, deitar, inicio, fim)
            VALUES(?,?,?,?,?,?,?,?,?)");

        $statement->execute($dados);
        if($statement){
            echo '1';            
            
        }else {
            echo '0';
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

}elseif($op=="gravamedic") {
    $nome = $_GET['nome'];
    $no = array();
    array_push($no, $nome);
    try {
      $statement = $db_con->prepare("INSERT INTO medicamentos (nome)
          VALUES(?)");

      $statement->execute($no);
      if($statement){
          echo '1';            
          
      }else {
          echo '0';
      }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}elseif($op=="gravapenso") {

    echo '->'.$_FILES['photoimg']['tmp_name'];
    //if (is_uploaded_file($_FILES['photoimg']['tmp_name'])) {
        
        //$fot = addslashes(file_get_contents("https://i.imgur.com/UYcHkKD.png"));
        $fot = fopen($_FILES['photoimg']['tmp_name'], 'rb');
        //$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
    //}
  $id = $_POST['utenteid'];
  $pensos = $_POST['descricao'];
  //$fot = addslashes(file_get_contents($_FILES["photoimg"]["tmp_name"]));
  date_default_timezone_set("Europe/lisbon");
  $tec = $_GET['tec'];
  $dia = date('Y-m-d');
  $hora = date("H:i");

  $no = array();
  array_push($no, $id);
  array_push($no, $pensos);
  array_push($no, $fot);
  array_push($no, $dia);
  array_push($no, $hora);
  array_push($no, $tec);

  print_r($no);

  try {
    $statement = $db_con->prepare("INSERT INTO pensos (idutente,penso, foto, dia, hora, tecnico)
        VALUES(?,?,?,?,?,?)");

    $statement->execute($no);
    if($statement){
        echo '1';            
        
    }else {
        echo '0';
    }
  } catch(PDOException $e) {
      echo $e->getMessage();
  }

  
}


?>