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
		   function AdminValidation()
		   {
			   var subject=document.AdminForm.subject;
			   var subinfo=document.AdminForm.sinfo;
			   
			   if(subject.value==""||subject.value==null)
			   {
				   alert("Please fill up the add subject field");
				   subject.focus();
				   return false;
			   }
			   
			   
			   if(subinfo.value==""||subinfo.value==null)
			   {
				   alert("plaese fill up the subject info filed");
				   subinfo.focus();
				   return false;
			   }
			   
			   
			   return true;
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
                            
        
                             require("mysql-to-json.php");
                            $sql = "select * from user;";
                             $jsonData=getJSONFromDB($sql);
                
                          $jsn=json_decode($jsonData);
                  
                            
                                for($i=0;$i<sizeof($jsn);$i++){
                                //if($jsn[$i]->name=="abc")
                                if(($jsn[$i]->name == $_SESSION["name"]))
                                {
                                    
                                     echo "<img src='image/".$jsn[$i]->image."' >";
                                    $name =  $jsn[$i]->name;
                                    $pass =  $jsn[$i]->pass;
                                    $id =  $jsn[$i]->id;
                                    $email =  $jsn[$i]->email;
                                    $phone =  $jsn[$i]->phone;
                                    $acc =  $jsn[$i]->usertype;
                                    
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
                        <form action="Admin.php" method="post" name="AdminForm" onsubmit="return AdminValidation();">
                          Add Subject: <input type="text" name="subject"> <br>
                          Subject Info: <input type="text" name="sinfo"><br>
                          <input type="submit" value="submit" name="subadd" onsubmit="return AdminValidation();">  
                        </form>
                            <form action="Admin.php" method="post">
                             Delete Coureses:
                            <select name='delete' id=''>
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
                            <input  type="submit" value="ok" name="deletesub">
                            </form>
                                               
                    </div>
                </div>
                <div class="content2 left">
                <p>See Your Uploaded File</p>
                <?php
                    
                require("db_rw.php");
                    if(isset($_REQUEST['subadd']))
                    {
                        $sub = $_REQUEST['subject'];
                        $subInfo = $_REQUEST['sinfo'];
                        
                        $sql = "INSERT INTO subjects VALUES (NULL,'".$sub."','".$subInfo."')"; 
                        updateDB($sql);
                    }
                    else if(isset($_REQUEST['deletesub']))
                    {
                      $sub= $_REQUEST['delete'];
                         $sql = "select * from subjects;";
                            $jsonData=getJSONFromDB($sql);
                            $jsn=json_decode($jsonData);
                            for($i=0;$i<sizeof($jsn);$i++){
                             if($jsn[$i]->name==$sub)
                             {
                                 $id = $jsn[$i]->id;
                                  $sql = "delete from uploads where subid='$id'";
                                 updateDB($sql);
                                   $sql = "delete from subjects where id='$id'";
                                 updateDB($sql);
                             }
                           
                            }  
                    }
                   
                        
                         $sql = "select * from massage;";
                            $jsonData=getJSONFromDB($sql);
                            $jsn=json_decode($jsonData);
                            for($i=0;$i<sizeof($jsn);$i++){
                                $msg = $jsn[$i]->msg;
                                $id =$jsn[$i]->id;
                                echo "<p>$msg</p><br><a href='deletemsg.php?id=$id'>delete</a>";
                           
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
                        
                    </div>"
                            ?>
                </div>
            </div>
            <div class="footer_area">
                <div class="footer">
                &copy Al right reserved by Rezwanul Reza
            </div>
            </div>
            
            <?php
                if(isset($_REQUEST['uemail']))
                {
                 $uemail = $_REQUEST['changeEmail'];
                 $sql = "UPDATE user
                        SET email = '$uemail'
                        WHERE id = '$id';";
                 updateDB($sql);
                }
                if(isset($_REQUEST['uphone']))
                {
                 $uphone = $_REQUEST['changePhone'];
                 $sql = "UPDATE user
                        SET phone = '$uphone'
                        WHERE id = '$id';";
                 updateDB($sql);
                }
            ?>
             
	    </div>
	  
	    
		
	</body>

</html>