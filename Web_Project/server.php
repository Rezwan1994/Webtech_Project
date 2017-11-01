<?php
  require('db_rw.php');
    require("mysql-to-json.php");
    $subName = $_GET['name'];
   
             $sql = "select * from subjects;";
                $jsonData=getJSONFromDB($sql);
                $jsn=json_decode($jsonData);
                for($i=0;$i<sizeof($jsn);$i++){
                    if($jsn[$i]->name==$subName)
                    {
                        $subjects = $jsn[$i]->subinfo;
                        echo $subjects;
               
                    }
               
                }
               
?>