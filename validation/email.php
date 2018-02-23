<form action="#" method="POST">
	<fieldset>
		<legend>EMAIL</legend>
		<input type="text" name="email" value=""><br/><br/>
		<input type="submit" name="submit" value="Submit" >
		<hr/>
	</fieldset>
</form>
<?php 
if(isset($_POST["submit"])){
       $email = $_POST["email"];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}
}


?>

