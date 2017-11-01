<?php
function updateDB($sql){
	$conn = mysqli_connect("localhost", "root", "", "educationdb");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error($con));
	}
	if(mysqli_query($conn, $sql)) {
		echo "New records updated successfully";
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


?>