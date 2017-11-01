<?php
 require('db_rw.php');
 require("mysql-to-json.php");
$id = $_GET['id'];
$sql = "delete from massage where id='$id';";
updateDB($sql);
  
    header("Location:Admin.php");  
  

?>