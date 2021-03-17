<?php
    require_once "dbconfig.php";
    if(isset($_GET['image_id'])) {
      $id= $_GET['image_id'];
      $stmt = $db_con->query("SELECT foto FROM pensos where id=$id ");
      $vals = $stmt->fetch();
      //$img = str_replace('data:image/png;base64,', '', $img);
    //$img = str_replace(' ', '+', $img);
  
    $data = base64_decode($vals['foto']);
    $file = "image.jpg";
    $success = file_put_contents($file, $data);

    echo '<img src="image.jpg" />';

    //reading from text variable/ database (in case yousaved the text in the db as a field)

    //echo '<img src="data:image/jpg;base64,'. $vals['foto'].'" />';
      //echo base64_encode($vals['foto']);
		//header("Content-type: " . "image/jpg");
        //echo $vals["foto"];
        //echo '<img src="data:image/jpeg;base64,'.base64_encode( $vals["foto"]).'"/>';
        //echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($vals['foto']).'" />';
	}

?>