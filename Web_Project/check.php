<?php
session_start();
print_r(_SESSION);
function getJSONFromDB($sql){
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
print_r ($jsn);
	$user_name = $_REQUEST["user_name"];
	$user_Pass = $_REQUEST["user_pass"];
	$flag = 0;
	for($i=0;$i<sizeof($jsn);$i++){
	//if($jsn[$i]->name=="abc")
		if(($jsn[$i]->name == $user_name) && ($jsn[$i]->pass == $user_Pass) && $jsn[$i]->usertype == 'Admin')
		{
				    $_SESSION["name"] = $user_name;
             $_SESSION["pass"] = $user_Pass;
            if(isset( $_SESSION["name"]))
            {
               header('location:Admin.php'); 
            }
				
			$flag=1;
			break;
		}
        else if(($jsn[$i]->name == $user_name) && ($jsn[$i]->pass == $user_Pass) && $jsn[$i]->usertype == 'User')
		{
             $_SESSION["name"] = $user_name;
             $_SESSION["pass"] = $user_Pass;
            if(isset( $_SESSION["name"]))
            {
               header('location:profile.php'); 
            }
				
			$flag=1;
           
			break;
		}
		
	}
	if($flag == 0)
	{
        $_SESSION["xx"] = 0;
        
		header('location:login.php');

	}
	
	
?>

