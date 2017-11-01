<?php
/*function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","educationdb");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
$jsonData= getJSONFromDB("select * from user");


$jsn=json_decode($jsonData);

echo "<pre>";print_r($jsn);echo "</pre>";
/*for($i=0;$i<sizeof($jsn);$i++){
		echo $jsn[$i]["name"]." earned ".$jsn[$i]["cgpa"];
		echo "<br>";
}*/
/*for($i=0;$i<sizeof($jsn);$i++){
	//if($jsn[$i]->name=="abc")
		echo $jsn[$i]->name." earned ".$jsn[$i]->cgpa;
		echo "<br>";
}

/*foreach($jsn as $v){
	if($v->id=="123")
		echo $v->name."";
}*/
//print_r($_SERVER);*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
		            <li><a href="regi_form.php">Sign Up</a></li>
		            
		        </ul>
		    </div>
        </div>
 
    
    <div class="login-area">
        
            <div class="form-content">
                <form action="check.php" name="frm" method="post">
                    <input type="text" name = "user_name" placeholder="user name" > <br>
                    <p id="name"></p>
                    <input type="password" name = "user_pass" placeholder="user password" > <br>
                    <p id="pass"></p>
                    <span><input type="submit" onclick="myFunction()" value="submit" ><br></span>
                    <a href="regi_form.php" >Sign up for your account</a>
                </form>
            </div>
        
    </div>
    </div>
 
  <?php
     $_SESSION["xx"]=1;
   session_start();
   
        if(  isset($_SESSION["xx"]))
        {
            if($_SESSION["xx"]==0)
            {
                    echo"      <script>   
                    pass.innerHTML='invalid user name or password';
                    pass.style.color='red';
                   
                    </script> ";
                    $_SESSION["xx"]=1;  
            }
         
              
     
        }
    

    
    ?>
 
</body>