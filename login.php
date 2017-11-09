<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form 
      
      $myusername = $_POST['email'];
      $mypassword = $_POST['password']; 
	  //$myfname = $_POST['fname'];
	  
      $conn = new mysqli( 'sql2.njit.edu', 'ecm6', 'ctnpCOd7', 'ecm6');
      $sql = "SELECT email FROM accounts WHERE email = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($result->num_rows > 0) {
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
		 echo "hello";
         header("location: welcome.php");
      }else {
		  echo "Hello 2";
         $error = "Your Email or Password is invalid " . $myusername . " blank " . $mypassword;
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "login.php" method = "post">
                  <label>Email  :</label><br><input type = "text" name = "email" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
				  <a href="index.html" class="button">Go to Signup Page</a>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>