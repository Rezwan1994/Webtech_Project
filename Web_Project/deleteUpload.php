<?php
 require('db_rw.php');
 require("mysql-to-json.php");
$id = $_GET['id'];
$sql = "delete from uploads where id='$id';";
updateDB($sql);
  
    header("Location:profile.php");  
  

?>