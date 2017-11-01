<?php
  session_start();
ob_start(); 

if(isset($_SESSION['name']))
{
   
}
else
{
    echo "you are anothorized to access!!";
    die();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Reza</title>
		<link rel="stylesheet" href="css/profile.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		
		<script>
            
            function RequestValidation()
            {
                var message=document.RequestForm.msg;
                
                if(message.value == "" || message.value == null)
                    {
                        alert("Fill up the request field");
                        message.focus();
                        return false;
                    }
                return true;
            }
            function FileValidation()
            {
                var file = document.fileform.fileUpload; 
                     if(message.value == "" || message.value == null)
                    {
                        alert("select your file first");
                        message.focus();
                        return false;
                    }
                return true
            }
            function updateValidation($e)
            {
               
               
              if($e.name == 'email')
                  {

                         ce.innerHTML="<form action='profile.php' method='post'><input type='text' name='changeEmail'> <input type='submit' value='ok' name='uemail'></form>"; 
                  }
                else if($e.name == 'phone')
                  {
                       
                         cp.innerHTML="<form action='profile.php' method='post'><input type='text' name='changePhone'> <input type='submit' value='ok' name='uphone'></form>"; 
                  }
                   
                    
            }
            
            
        </script>
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
		            <li><a href="distroy.php">Log Out</a></li>
		            
		        </ul>
		    </div>
            </div>
            <div class="main_content">
                <div class="content1 left">
                    <div class="photo_area">
                        <div class="photo">
                           <?php
                            
                            require('db_rw.php');
                             require("mysql-to-json.php");
                            $sql = "select * from user;";
                             $jsonData=getJSONFromDB($sql);
                
                          $jsn=json_decode($jsonData);
                  
                            
                                for($i=0;$i<sizeof($jsn);$i++){
                                    $pass=$jsn[$i]->pass;
                                //if($jsn[$i]->name=="abc")
                                    if(($jsn[$i]->name == $_SESSION["name"]) && $jsn[$i]->pass==$pass)
                                    {
                                      
                                         $name =  $jsn[$i]->name;
                                        $pass =  $jsn[$i]->pass;
                                        $id =  $jsn[$i]->id;
                                        $email =  $jsn[$i]->email;
                                        $phone =  $jsn[$i]->phone;
                                        $acc =  $jsn[$i]->usertype;
                                        $image = $jsn[$i]->image;
                                        if($image != NULL)
                                        {
                                           echo "<img src='image/$image'>'";
                                            break;
                                        }
                                        
                                       

                                    }
                                }
                                                 
                    
?>
                           
                        </div>
                        <div class="photo_text">
                           
                            <a href="">Upload your photo</a>
                            <form action="checkimg.php" method="post" enctype="multipart/form-data" name="mfm">
                                <input type="file" name="fileToUpload">
                                <input type="submit" value="Upload File" name="submit">
                            </form>                        
                       
                        </div>
                    </div>
                    <div class="file_area">
                        Upload Your File :
                        <div class="select_subject">
                            Select your subject
                            <form action="profile.php" method="post" name="fileform" onclick="return FormValidation() "enctype="multipart/form-data" >
                            <select name='subject' id=''>
                            <?php    
                            $sql = "select * from subjects;";
                            $jsonData=getJSONFromDB($sql);
                            $jsn=json_decode($jsonData);
                            for($i=0;$i<sizeof($jsn);$i++){
                            $subjects = $jsn[$i]->name;
                            echo " 
                            <option value='$subjects'>$subjects</option> ";
                            }                     
                            ?>
                                </select><br>
                             Select Video Type: <br>
                               <select name="type" id="">
                                <option value="Video">Video</option> 
                                <option value="Doc">Doc</option> 
                                <option value="Image">Image</option> 
                             </select>
                              <input type="file" name="fileUpload" />
                              
                              <input type="submit" value="submit" name="sub">
                             
                            </form>
                            
                        
                            
                           
                        </div>
                      
                         
                        
                    </div>
                </div>
                <div class="content2 left">
                <p>See Your Uploaded File</p>
                <?php
                        $sql = "select * from uploads;";
                $jsonData=getJSONFromDB($sql);
                   
                
                $jsn=json_decode($jsonData);
                  for($i=0;$i<sizeof($jsn);$i++){
                   
                  if(($jsn[$i]->userId == $id))
                  {
                  
                      $image=$jsn[$i]->image;
                      $video=$jsn[$i]->videoname;
                      $doc=$jsn[$i]->doc;
                       $_SESSION["id"]= 1;
                         $subId = $jsn[$i]->id; 
                    if($jsn[$i]->image !=NULL)
                    {
                        echo "<p>$image</p>   <a href='download.php?id=$id & image=$image'>download</a>     <a href='deleteUpload.php?id=$subId'>delete</a><br>";
                    }
                    else if($jsn[$i]->videourl !=NULL)
                    {
                        echo "<p>$video</p> <a href='download.php?id=$id & video=$video'>download</a>      <a href='deleteUpload.php?id=$subId'>delete</a><br>";
                    }
                    else if($jsn[$i]->doc !=NULL)
                    {
                        echo "<p>$doc</p> <a href='download.php?id=$id & doc=$doc'>download</a>     <a href='deleteUpload.php?id=$subId'>delete</a><br>";
                    }
                      
                
                           
                            
                  }
                }
                    ?>
                  

                </div>
                <div class="content3 left">
                   <?php
                    
                   echo " <div class='profileInfo'>
                            <h1>Personal Info:</h1> 
                            <h3>name: $name</h3> 
                            <h3>Id: $id</h3> 
                            <h3>Account type: $acc</h3>
                           
                            Phone: $phone<input type='button' value='Edit' name='phone' onclick='return updateValidation(this);'>
                            
                            <p id='cp'></p>
                            email: $email<input type='button' value='Edit' name='email'  onclick='return updateValidation(this);'>
                            <p id='ce'></p>
                        
                        </div>";
                            ?>
                             <div class="massage">
                   <h3>Request for tutorials</h3>
                   <form action="profile.php" method="post"  name="RequestForm" onsubmit="return RequestValidation();">
                   
                   <textarea name="msg" id="" cols="30" rows="10"></textarea><br>
                    <input type='submit' value='Send'name='msgsub' onsubmit="return RequestValidation();">
               
                   </form>
                    
                </div>
                         
                </div>
           
                
               
            </div>
            <div class="footer_area">
                <div class="footer">
                &copy Al right reserved by Rezwanul Reza
            </div>
            </div>
             
	    </div>
	    <?php
                       
           if(isset($_REQUEST['sub']))
           {
                    //require("db_rw.php");
            $subject = $_REQUEST['subject'];
               echo $subject;
                 $sql = "select * from subjects;";
                $jsonData=getJSONFromDB($sql);
                
                $jsn=json_decode($jsonData);
                  for($i=0;$i<sizeof($jsn);$i++){
                  if(($jsn[$i]->name == $subject))
                  {
                     $subId=$jsn[$i]->id; 
                    
                  }
                  }
                  
               
               if($_REQUEST['type']=='Image')
               {
                        $target = "image/".basename($_FILES['fileUpload']['name']);
          
                       $image = $_FILES['fileUpload']['name'];
                      $ext = pathinfo($image, PATHINFO_EXTENSION);
                        if($ext =='png' || $ext == 'jpg' )
                        {
                            
                               $sql = "INSERT INTO uploads
                                VALUES (NULL,'".$id."','".$subId."',NULL,'".$image."',NULL,NULL);";
                        
                       updateDB($sql);
                        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target)) {
                        $msg = "Image uploaded successfully";
                            header("Location:profile.php");
                        }
                       else{
                        $msg = "Failed to upload image";
                        }
                        

                        }
                   else
                   {
                      echo "  <script>alert('You can upload only jpg or png file')</script>";
                   }
                      
               }
            else if($_REQUEST['type']=='Video')
               {
                
                
                      
                        $name = $_FILES["fileUpload"]["name"];
                        $target_dir = "videos/";
                        $name =  basename($_FILES["fileUpload"]["name"]);
                        $ext = pathinfo($name, PATHINFO_EXTENSION);
                        if($ext !='mp4' )
                        {
                            echo "  <script>alert('You can upload only mp4 file')</script>";

                        }
                    else
                    {
                       $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
                        $url = "http://localhost/Project/videos/$name";
                       
                
                        $sql = "INSERT INTO uploads
                                VALUES (NULL,'".$id."','".$subId."','".$url."',NULL,NULL,'".$name."');";
                      
                       updateDB($sql);
                        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
                        $msg = "video uploaded successfully";
                             header("Location:profile.php");
                        }
                       else{
                        $msg = "Failed to upload image";
                        }  
                    }
                       
               }
               else if($_REQUEST['type']=='Doc')
               {
                        $target = "docx/".basename($_FILES['fileUpload']['name']);
          
                       $doc = $_FILES['fileUpload']['name'];
                    $ext = pathinfo($doc, PATHINFO_EXTENSION);
                     if($ext != 'doc' )
                        {
                        echo "  <script>alert('You can upload only doc file')</script>";

                        }
                   else
                   {
                    
                        $sql = "INSERT INTO uploads
                                VALUES (NULL,'".$id."','".$subId."',NULL,NULL,'".$doc."',NULL);";
                        
                       updateDB($sql);
                        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target)) {
                        $msg = "Image uploaded successfully";
                             header("Location:profile.php");
                        }
                       else{
                        $msg = "Failed to upload image";
                        }   
                   }
               }
               
         
           }
        if(isset($_REQUEST['msgsub']))
                    {
                 
                        $sql="INSERT INTO massage VALUES (NULL,'$id','".$_REQUEST['msg']."');";
                      	updateDB($sql);
                         $msg= $_REQUEST['msg'];
                     
                            
                    }
     
         if(isset($_REQUEST['uemail']))
         {
             $uemail = $_REQUEST['changeEmail'];
             $sql = "UPDATE user
                    SET email = '$uemail'
                    WHERE id = '$id';";
             updateDB($sql);
             header("Location:profile.php");
         }
          if(isset($_REQUEST['uphone']))
         {
             $uphone = $_REQUEST['changePhone'];
             $sql = "UPDATE user
                    SET phone = '$uphone'
                    WHERE id = '$id';";
             updateDB($sql);
            header("Location:profile.php");
         }

        ?>
	    
		
	</body>

</html>
<?php ob_flush(); ?>