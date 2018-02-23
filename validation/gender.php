<?php 
    error_reporting(0);
?>

<form action="#" method="POST">
	<fieldset>
		<legend>GENDER</legend>
		<input type="radio" name="gender" value="Male">
		<label>Male</label>
		
		<input type="radio" name="gender" value="Female" >
		<label>Female</label>
		
		<input type="radio" name="gender" value="Others">
		<label>other</label><br>
		
		<input type="submit" name="submit" value="Submit" >
		<hr/>
	</fieldset>
</form>


<?php
	
	
	
	
         if(isset($_POST["submit"])){
              
                
                 if(isset($_POST["gender"]))
                 {
                     echo "valid";
                 }
                else echo "Invalid!";
            }
	
	
?>