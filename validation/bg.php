<?php 
    error_reporting(0);
?>

<form action="#" method="POST">
	<fieldset>
		<legend>BLOOD GROUP</legend>
		<select name="bloodgroup">
          <option value="apos">A+</option>
          <option value="aneg">A-</option>
          <option value="bpos">B+</option>
          <option value="bneg">B-</option>
          <option value="abpos">AB+</option>
          <option value="abneg">AB-</option>
          <option value="opos">O+</option>
          <option value="oneg">O-</option>
        </select>
		<br><br>
		
		<input type="submit" name="submit" value="Submit" >
		<hr/>
	</fieldset>
</form>


<?php
	
	
	
	
         if(isset($_POST["submit"])){
              
                
                 if(isset($_POST["bloodgroup"]))
                 {
                     echo "valid";
                 }
                else echo "Invalid!";
            }
	
	
?>