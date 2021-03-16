<?php
    require_once "dbconfig.php";
    if(isset($_GET['image_id'])) {
      $id= $_GET['image_id'];
      $stmt = $db_con->query("SELECT foto FROM pensos where id=$id ");
      $vals = $stmt->fetch();
      //echo base64_encode($vals['foto']);
		header("Content-type: " . "image/jpg");
        echo $vals["foto"];
        //echo '<img src="data:image/jpeg;base64,'.base64_encode( $vals["foto"]).'"/>';
        //echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($vals['foto']).'" />';
	}

?>