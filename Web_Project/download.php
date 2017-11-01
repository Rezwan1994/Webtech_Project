<?php

    
        require("mysql-to-json.php");

       
       
     
  
   
         
        
        if(isset( $_GET['image']))
        {
            $img =$_GET['image'];
             $id = $_GET['id'];
        $sql = "select * from uploads where userId='$id' and image='$img';";
        $jsonData=getJSONFromDB($sql);

        $jsn=json_decode($jsonData);
            for($i=0;$i<sizeof($jsn);$i++){
              
                $image=$jsn[$i]->image;
            
            
                $path = "image/".$image;
               header("Content-Disposition: attachment; filename=\"" .$image. "\";");
                header('content-type:aplication/octent-strem');
                header('content-length='.filesize($path));
                readfile($path);
              
        }
        }
  else if(isset( $_GET['video']))
        {
            $vdo =$_GET['video'];
             $id = $_GET['id'];
      
        $sql = "select * from uploads where userId='$id' and videoname='$vdo';";
         $jsonData=getJSONFromDB($sql);
         $jsn=json_decode($jsonData);
            for($i=0;$i<sizeof($jsn);$i++){
                         
                $path = "videos/".$vdo;
        header("Content-Disposition: attachment; filename=\"" .$vdo. "\";");
                header('content-type:aplication/octent-strem');
                header('content-length='.filesize($path));
                readfile($path);
                echo "hgfhkj";
              
        }
        }
  else if(isset( $_GET['doc']))
        {
      
         $doc =$_GET['doc'];
             $id = $_GET['id'];
      
        $sql = "select * from uploads where userId='$id' and doc='$doc';";
         $jsonData=getJSONFromDB($sql);
       $jsn=json_decode($jsonData);
            for($i=0;$i<sizeof($jsn);$i++){
              
                $doc=$jsn[$i]->doc;
            
            
                $path = "docx/".$doc;
          header("Content-Disposition: attachment; filename=\"" .$doc. "\";");
                  header('Content-Transfer-Encoding: binary');
                header('content-type:aplication/octent-strem');
                header('content-length='.filesize($path));
                readfile("docx/".$doc);
              
        }
        }
     
        
?>