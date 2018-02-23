

<form action="#" method="POST">
	<fieldset>
		<legend>Date of Birth</legend>
		<table>
			<tr>
				<td align = "center">dd </td>
				<td align = "center">mm </td>
				<td align = "center">yyyy</td>
			<tr>
			<tr>
				<td>
					<input 
					type="text" 
					name="date" 
					value="<?php if(isset($_POST['date'])){echo $_POST['date'];} ?>"> /
				</td>
				<td>
					<input 
					type="text" 
					name="month" 
					value="<?php if(isset($_POST['month'])){echo $_POST['month'];} ?>"> /
				</td>
				<td>
					<input 
					type="text" 
					name="year" 
					value="<?php if(isset($_POST['year'])){echo $_POST['year'];} ?>">
				</td>
			<tr>
			
		</table>
		<input type="submit" name="submit" value="Submit" >
		<hr/>
	</fieldset>
</form>


<?php
    	function validMonth($month){
			if($month>=1 && $month <= 12){
			   return 1;
			}else{
				return 0;
			}
		}
		function validDate($date){
			if($date>=1 && $date <= 31){
			   return 1;
			}else{
				return 0;
			}
		}
		function validYear($year){
			if($year>=1953 && $year <= 2020){
			   return 1;
			}else{
				return 0;
			}
		
        }
		function validDob($month,$date,$year){
			if(validMonth($month)== 1 && validDate($date) == 1 ){
				if(validYear($year)==1){
					return 1;
				}else{
					return 0;
				}
			}
        }
            
            if(isset($_POST["submit"])){
                $month=$_REQUEST["month"];
                $date=$_REQUEST["date"];
                $year=$_REQUEST["year"];
                
                 if(validDob($month,$date,$year) == 1)
                 {
                     echo "valid";
                 }
                else echo "Invalid!";
            }
            
            
?>