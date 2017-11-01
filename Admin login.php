<?php 
//session_start();
include("resources/dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel = "stylesheet" type = "text/css" href="resources/Library Style.css" />
<style type="text/css">
<!--
.hh {
	text-align: center;
	color: #00F;
}
col {
	color: #006;
}
.hh marquee {
	text-align: right;
	font-weight: bold;
	color: #00F;
}
.ww {color: #F00;
	text-decoration: blink;
}
-->
</style>
</head>

<body align="center">
<table width="75%" border="0" align="center">
  <tr>
    <td><img src="images/banner.png" width="100%" height="248" alt="yyyy" /></td>
  </tr>
  <tr>
    <td><table width="30%" border="0" align="right" background="images/banna.jpg">
      <tr>
       <td width="52%"><img src="images/about.jpg" width="100%" height="20" alt="us" /></td>
       <td width="48%"><a href="Signin Page.php"><img src="images/Logout.jpg" width="100%" height="20" alt="jhhj" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr valign="middle">
    <td align="center" class="hh"><table width="100%" border="0">
      <tr>
        <td width = "20%">&nbsp;</td>
        <td width="60%" bgcolor="#0099CC"><p><img src="images/login_banner.png" width="100%" height="130" alt="m" /></p>
          <form id="form1" name="form1" method="post" action="">
          
              <p>
                <label>Username:<br />
                  <input name="Username" type="text" id="Username" />
                </label>
                </br>
                <br>
                <label>   Password:<br />
                  <input type="password" name="Password" id="Password" />
                </label>
              </p>
              <p>
                <input name="Login" type="submit" class="style2" id="Login" value="Log in &gt;&gt;&gt;" />
                <input name="Cancel" type="reset" class="style2" id="Cancel" value="Cancel" /><br/>
                <span class="ww">
                  <?php
		  	 	  if(isset($_POST['Login'])){
			      $Username = $_POST['Username'];
				  $Password = $_POST['Password'];
				   if(empty($Username) ||  empty($Password)) 
					{  echo "Please Ensure you type Username or Password in the Admin Login form provided <br>\n <strong> Unable to Sign in Admin User </strong>"; 
					 goto exit1;
					}
				else
				   {
					//$_SESSION['Username'] = $Username;
					
				     $Qry1 = "SELECT Username, Password from dbAdminUser where Username = '". $Username. "' and Password = '". $Password. "'";
				     $Result = mysql_query($Qry1);
				    if (mysql_num_rows($Result) == 0){
				    echo "You've supply wrong Username and Password \n<br> <strong> Unable to Sign in Admin User </strong>";
					 goto exit1;
					 }
				     header('location: Add Doctor.php');					
			  
			  } //end else
			  
			  
		} //end if isset
			  												
 exit1:		    
		  		  		  
		  ?>
              </span></p>
<p class="style11">&nbsp;</p>
          </form>
          <p>&nbsp;</p></td>
          <td width = "20%"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="hh"><marquee>
    Welcome to Mobile-Based Medical Alert System!!!
    </marquee></td>
  </tr>
   <tr>
    <td class="hh">
    <img src="images/footer.png" width="100%" height="75" alt="uu" />
    </td>
  </tr>
</table>
</body>
</html>