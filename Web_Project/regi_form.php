<!DOCTYPE html>
<html>
     <head>
	     <title>Registration form</title>
		 
		   <script>
		   
		        function FormValidation()
				{
					
					 var name=document.RegistrationForm.uname;
					 var password=document.RegistrationForm.upass;
					 var conpassword=document.RegistrationForm.cpass;
					 var phone=document.RegistrationForm.phone;
					 var email=document.RegistrationForm.email;
					 var pin =document.RegistrationForm.pin;
					 
					 
					 if(name.value=="" || name.value==null)
					 {
						 confirm("Please enter your name");
                         name.focus();
                         return false;						 
					 }
					 
				    if(password.value=="" || password.value==null)
				     {
					     alert("Please enter password");
						 password.focus();
						 return false;
				     }
				   
				   if(conpassword.value=="" || conpassword.value==null)
				     {
					     alert("Please re-enter password");
						 conpassword.focus();
						 return false;
				     }
				   
				   if( password.value != conpassword.value )
				     {
                         alert("Password not matched please try again");
                         conpassword.focus();
                         return false;						 
				     }
				   
				   
				   if(phone.value=="" || phone.value==null)
				     {
                         alert("Please provide your contact numbr");
                         phone.focus();
                         return false;						 
				     }
				   
				   if(email.value==""||email.value==null)
				    {
					   alert("please fill up email field");
					   email.focus();
					   return false;
				    }
				   if (email.value.indexOf("@",0)<0)
				    {
				     alert("Please enter valid e-mail address");
					 email.focus();
					 return false;
				    }
				 
				 if(email.value.indexOf(".",0)<0)
				   {
				     alert("Please enter valid e-mail address");
					 email.focus();
					 return false;
				   }
				  
				  if(pin.value==""||pin.value==null)
				   {
					  alert("Please enter pin number");
					  pin.focus();
					 return false;
				   }
				   
				 return true;
				}
		</script>
			 
		 <style>
		 
		     div
			{
			    position: absolute;
				top:120px;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
			    padding-top: 6px;
				padding-right: 16px;
				padding-bottom: 6px;
				padding-left: 200px;
				font-size: 12px;
				width:500px;
				height:1000px;
				background-color:Plum ;
				opacity:0.7;
				color:black ;
				box-shadow:5px 5px 5px MistyRose ;
				font-size: 25px;
				
				
				
				
			}
			body
			{
			   background-image:url("image/body.jpg");
			}
			
			input[type=submit] 
			{
               width:80px; 
			   height:60px;
			   margin-left:40px;
			   background-color:RoyalBlue  ;
			   color:default;
			   size:20px;
			   font-size:20px;
            }
			
			select
			{
				width: 250px;
				height: 30px;
				border-width: 3px;
				border-color: rgba(50, 50, 50, 0.14);
				margin: 10px 10px 10px 0px;
				font-size:20px;
            }
			
			
			
			
			
			
			input[type=text] 
			{
               width:380px; 
			   height:30px;
			   background-color:default;
			   border-width:3px;
			   border-color: rgba(50, 50, 50, 0.14);
			   color:default;
			   size:20px;
			   font-size:20px;
            }
			
			
			
			input[type=password] 
			{
               width:380px; 
			   height:30px;
			   background-color:default;
			   border-width:3px;
			   border-color: rgba(50, 50, 50, 0.14);
			   color:default;
			   
			   font-size:20px;
            }

    
}





			
			
			
			
			
		 </style>
	 </head>
	 
	 
	 <body style="background-color:black"  >
	     <div>
	   
            <div>
                <form action='regi_form.php' method="post" name="RegistrationForm" onsubmit="return FormValidation();">
			 
			     <h1 align="center-left">Create an account</h1>
				 User Name:</br></br>
				 <input type="text" name="uname"  placeholder="Your name"></br></br>
				 
				 User password:</br></br>
				 <input type="password" name="upass"  placeholder="enter password"></br></br>
				 
				 
				 Confirm Password:</br><br>
				 <input type="password"  name="cpass" placeholder="Re-enter your password"></br></br>
				 Phone:</br></br>
				 <input type="text"  size= "50"  style="height:30px"  name="phone" placeholder="Provide your contact number"></br></br>
				 Email:</br></br>
				 <input type="text"   size= "50"  style="height:30px"  name="email" placeholder="Enter your valid e-mail address"></br></br>
				 Pin:</br></br>
				 <input type="password" name="pin" placeholder="Give your pin">
				
				<span><input type="submit" name="submit" onsubmit="return FormValidation();"> </span>
               </form>
            </div>
		     
				 
				 
				 
			 </form>
		 </div>

	 </body>
</html>

<?php
require("db_rw.php");
$sql="";
if(isset($_REQUEST['uname']) && isset($_REQUEST['upass']) && isset($_REQUEST['phone'])&&isset($_REQUEST['email']) && isset($_REQUEST['pin']))
{
    if($_REQUEST['pin'] == 123)
    {
$sql="INSERT INTO user VALUES (NULL,'".$_REQUEST['uname']."','".$_REQUEST['upass']."','".$_REQUEST['phone']."','Admin','".$_REQUEST['email']."','".$_REQUEST['pin']."','demoprofile.jpg')"; 
    }
    else
    {
        $sql="INSERT INTO user VALUES (NULL,'".$_REQUEST['uname']."','".$_REQUEST['upass']."','".$_REQUEST['phone']."','User','".$_REQUEST['email']."','".$_REQUEST['pin']."','demoprofile.jpg')"; 
    }
    echo $sql;
	updateDB($sql);
}


?>


