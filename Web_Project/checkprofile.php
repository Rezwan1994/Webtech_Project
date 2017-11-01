<?php
  session_start();

    if(isset($_SESSION['name']) && isset($_SESSION['pass']))
    
    {
        require('db_rw.php');
        require("mysql-to-json.php");
        $jsonData= getJSONFromDB("select * from user");
        $jsn=json_decode($jsonData);
        for($i=0;$i<sizeof($jsn);$i++){
	
		if(($jsn[$i]->name ==$_SESSION['name']) && ($jsn[$i]->pass == $_SESSION['pass']) && $jsn[$i]->usertype == 'Admin')
		{
		
               header('location:Admin.php'); 
            
			break;
		}
       if(($jsn[$i]->name ==$_SESSION['name']) && ($jsn[$i]->pass == $_SESSION['pass']) && $jsn[$i]->usertype == 'User')
		{ 
            header('location:profile.php'); 			
			break;
		}
		
        
	  
		
	   }
    }
else
{
    echo "<script>alert('You need to Register first!!')</script> ";
   // header('location:homepage.php'); 
}
    

?>
