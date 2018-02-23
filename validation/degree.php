<?php
	error_reporting(0);
?>
<form action="#" method="POST">
	<fieldset>
		<legend>DEGGREE</legend>
		<input type="checkbox" name="degree" value="SSC" >
		<label>SSC</label>
		
		<input type="checkbox" name="degree1" value="HSC">
		<label>HSC</label>
		
		<input type="checkbox" name="degree2" value="BSc" >
		<label>BSc</label>
		
		<input type="checkbox" name="degree3" value="MSc" >
		<label>MSc</label></br></br>
		
		<input type="submit" name="submit" value="Submit" >

		<hr/>
	</fieldset>
</form>


<?php 
if(isset($_POST["submit"]))
{
    $count = 0;
if( $_POST["degree"] == SSC)
{
    $count++;
} 
if($_POST["degree1"] == HSC)
{
    $count++;
}
if($_POST["degree2"] == BSc)
{
    $count++;
}
if($_POST["degree3"] == MSc)
{
    $count++;
}

 if($count <2)
 {
     echo "Error!!";
 }
else
{
    echo "checked";
}
}

?>


