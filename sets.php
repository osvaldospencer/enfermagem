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
            array_push($dados, addslashes($_GET['medicamento']));
            array_push($dados, addslashes($_GET['manha']));
            array_push($dados, addslashes($_GET['almoco']));
			array_push($dados, addslashes($_GET['lanche']));
			array_push($dados, addslashes($_GET['jantar']));
      array_push($dados, addslashes($_GET['deitar']));
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
    array_push($no, addslashes($nome));
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


    

  $id = $_POST['utenteid'];
  $pensos = $_POST['descricao'];
  //$fot = addslashes(file_get_contents($_FILES["photoimg"]["tmp_name"]));
  date_default_timezone_set("Europe/lisbon");
  $tec = $_GET['tec'];
  $dia = date('Y-m-d');
  $hora = date("H:i");


$dest = 'images/';
//move_uploaded_file(basename($_FILES["photoimg"]["name"]), "$dest".$_FILES["photoimg"]["name"]);
$file = 'images/'.basename($_FILES["photoimg"]["name"]);
if (move_uploaded_file($_FILES['photoimg']['tmp_name'], $file)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}




$uploadimage = $file; //$dest.$_FILES["photoimg"]["name"];
$newname = time();
// Set the resize_image name
$resize_image = $dest.$newname.".jpg"; 
$actual_image = $dest.$newname.".jpg";

// It gets the size of the image
list( $width,$height ) = getimagesize( $uploadimage );


// It makes the new image width of 350
$newwidth = $width * 0.3;


// It makes the new image height of 350
$newheight = $height * 0.3;


// It loads the images we use jpeg function you can use any function like imagecreatefromjpeg
$thumb = imagecreatetruecolor( $newwidth, $newheight );
$source = imagecreatefromjpeg( $uploadimage );


// Resize the $thumb image.
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);


// It then save the new image to the location specified by $resize_image variable

imagejpeg( $thumb, $resize_image, 70 ); 

// 100 Represents the quality of an image you can set and ant number in place of 100.
    //Default quality is 75



//$fot=addslashes(file_get_contents($resize_image));
$fot = base64_encode(file_get_contents(addslashes($resize_image)));

unlink($file);
unlink($resize_image);

    //$fot = fopen($_FILES['photoimg']['tmp_name'], 'rb');

  $no = array();
  array_push($no, $id);
  array_push($no, addslashes($pensos));
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

  
}elseif ($op="gravasinais") {
    $dados = array();
  //parse_str($_GET['data'], $dados);
  
  //print_r($_GET);
  date_default_timezone_set("Europe/lisbon");
  $tec = $_GET['tec'];
  $dia = date('Y-m-d');
  $hora = date("H:i");

            array_push($dados, $_GET['utenteid']);
            array_push($dados, addslashes($_GET['ta']));
            array_push($dados, addslashes($_GET['sp']));
            array_push($dados, addslashes($_GET['fc']));
			array_push($dados, addslashes($_GET['gli']));
			array_push($dados, addslashes($_GET['temp']));
      array_push($dados, addslashes($_GET['dor']));
      array_push($dados, $dia);
      array_push($dados, $hora);
      array_push($dados, $tec);
    
      print_r($dados);

      try {
        $statement = $db_con->prepare("INSERT INTO sinais (idutente,ta,sat,fc, gli, temp, dor, dia, hora, tecnico)
            VALUES(?,?,?,?,?,?,?,?,?,?)");

        $statement->execute($dados);
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