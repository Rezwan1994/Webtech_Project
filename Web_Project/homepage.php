<!DOCTYPE html>
<html>

     <head>
	 
	     <title>Dropdown navigation bar</title>
		 
		 <style>
		      
			  body
			  {
                 background-image:url("Book-Desktop-Wallpapers-HD.JPG");
                 background-color:Silver ;
                font-family: 'Lato', sans-serif;
                font-size: 14px;
                line-height: 20px;
                color: #444;
			  }
			  
			  
			  #Header
			  {
			      width:100%;
				  height:120px;
				  font-size:20px;
				  text-align:center;
			  }
			  
			 
			  
		 
		      ul
			  {
			     margin:0px;
				 padding:0px;
			  }
			  
			  ul li a
			  {
			     text-decoration:none;
				 color:white;
				 display:block;
				 width:120px
				 text-align:center;
				 
			  }
			  
			  ul li 
			  {
			     float:left;
				 width:186px;
				 height:40px;
                 background-color:SlateBlue   ;
				 font-size:20px;
				 list-style-type:none;
				 line-height:40px;
				 text-align:center;
				 opacity:.6;
				 border:2px solid silver;
				 
				 
			  }
             
                #nav {
                    padding-left: 166px;
                }
			  
			  ul li a:hover
			  {
			     background-color:MediumSpringGreen;
				 display:block;
				 
			  }
			  
			  ul li ul li
			  {
			    display:none;
				
			  }
			  
			  ul li:hover ul li
			  {
			     display:block;
			  }
             
                .search {
                    display: table;
                    margin-left: 455px;
                    margin-top: 190px;
                }
			  
		 </style>
		 
		 <script>
        // xmlhttp = new XMLHttpRequest();
        function showHint() {
            var xmlhttp = new XMLHttpRequest();
            var str=document.getElementById('search').value;	
            document.getElementById("spinner").style.visibility= "visible";
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("spinner").style.visibility= "hidden";
                    m=document.getElementById("txtHint");
                    msg=xmlhttp.responseText;
                    //alert(msg);
                    m.innerHTML=msg;
                }
            };
            var url="server.php?name="+str;
            //alert(url);
            xmlhttp.open("GET", url,true);
            xmlhttp.send();
        }
        </script>
		 
	 </head>
	 
	 
	 <body>
	 

         <div id="Header">
            <h1>Get.Shere.Help</h1>
            <h3>Share what you know get what you need and love to help</h3>
         </div>

		 <div class="menu">
		    <div id="nav">
					 <ul>
						 <li><a href="homepage.php">Home</a></li>
						
						
						 <li><a href="tutorial"> Tutorial</a>
							 <ul>
                                
                                <?php 
                                   require('db_rw.php');
                                   require("mysql-to-json.php");
                                $sql = "select * from subjects;";
                                $jsonData=getJSONFromDB($sql);
                                $jsn=json_decode($jsonData);
                                for($i=0;$i<sizeof($jsn);$i++){
                                $subjects = $jsn[$i]->name;
                                $id = $jsn[$i]->id;
                                echo 
                                    " 
                                  <li><a href='subjects.php?id=$id'>$subjects</a></li> ";
                                }                     
                            ?>
							 </ul>
				        </li>

						 
						 <li><a href="checkprofile.php">My Profile</a></li>
						 <li><a href="distroy.php">login</a></li>
						 <li><a href="regi_form.php">Register</a></li>
					 </ul>
				 </div> 
		 </div>
				 
		 <div class="search">
		     Search for tutorials:<input type="text" name="sub" id="search" onkeyup="showHint()" > <img id="spinner" src="loading.gif" width="20px" height="20px" style="visibility:hidden"><br>
		    
		
                <p id="txtHint"></p>                 

       
		    <a href='subjects.php?id=<?php echo $id; ?>'><input type="button" value="search" name="searchsub"></a> 
		    
		 </div>
		 
		 
		 
		 
		 
		 
	 </body>
	 
</html>