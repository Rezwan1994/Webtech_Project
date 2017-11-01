


<!DOCTYPE html>
<html>
	<head>
		<title>Reza</title>
		
			<link rel="stylesheet" href="css/subject.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	</head>
	
	<body>
	    <div class="wrapper">
	        <div class="header">
		    <div class="logo left">
		         <img src="image/WB071911C.png" alt="">
		    </div>
		    <div class="header_list right">
		        <ul>
		            <li><a href="homepage.php">Home</a></li>
		            <li><a href="login.php">Log Out</a></li>
		            
		        </ul>
		    </div>
            </div>
            <div class="main_content">
                <div class="content1 left">
                    
                   <h1>see the image files</h1><br>
                    <?php
                    
                    require('db_rw.php');
                    require("mysql-to-json.php");
                    $sql = "select * from uploads;";
                    $jsonData=getJSONFromDB($sql);

                    $jsn=json_decode($jsonData);
                    $id = $_REQUEST['id'];
                    for($i=0;$i<sizeof($jsn);$i++){

                        if(($jsn[$i]->subId == $id))
                        {
                        $image=$jsn[$i]->image;


                            if($jsn[$i]->image !=NULL)
                            {
                                  echo "<p>$image</p><a href='download.php?id=$id && image=$image'>download</a><br>";
                              
                            }

                        }
                    }
                    ?>
                  
                </div>
                <div class="content2 left"><h1>See the video files</h1><br>
                   
                     <?php
                    
                  
                    $sql = "select * from uploads;";
                    $jsonData=getJSONFromDB($sql);

                    $jsn=json_decode($jsonData);
                    $id = $_REQUEST['id'];
                    for($i=0;$i<sizeof($jsn);$i++){

                        if(($jsn[$i]->subId == $id))
                        {
                        $video=$jsn[$i]->videoname;


                            if($jsn[$i]->videourl !=NULL)
                            {
                                 echo "<p>$video</p> <a href='download.php?id=$id & video=$video'>download</a><br>";
                            }
                   

                        }
                    }
                    ?>
                    
                </div>
                <div class="content3 left"><h1>See the doc files</h1>
                        <?php
                    
                  
                    $sql = "select * from uploads;";
                    $jsonData=getJSONFromDB($sql);

                    $jsn=json_decode($jsonData);
                    $id = $_REQUEST['id'];
                    for($i=0;$i<sizeof($jsn);$i++){

                        if(($jsn[$i]->subId == $id))
                        {
                        $doc=$jsn[$i]->doc;


                            if($jsn[$i]->doc !=NULL)
                            {
                                echo "<p>$doc</p> <a href='download.php?id=$id & doc=$doc'>download</a><br>";
                            }
                   

                        }
                    }
                    ?>
                </div>
            </div>
            <div class="footer_area">
                <div class="footer">
                &copy Al right reserved by Rezwanul Reza
            </div>
            </div>
             
	    </div>
		
	</body>

</html>