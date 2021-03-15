<?php

include('dbconfig.php');
/*
$op = "";
if (isset($_GET['op'])) {
  $op = $_POST['op'];
}

if ($op=="gravamedic") { */
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
/*} else {
  # code...
}

*/
?>