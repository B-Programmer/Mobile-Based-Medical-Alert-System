<?php 
session_start();
include("resources/dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Diseases Page</title>
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
    <td><table width="100%" border="0" align="right" background="images/banna.jpg">
      <tr>
       <td width="25%"><a href="View Diseases_1.php"><img src="images/View_Diseases.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="25%"><a href="View Doctor_1.php"><img src="images/View_Doctor.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="25%"><a href="User Feedback.php"><img src="images/Send_Feedback.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="25%"><a href="Signin Page.php"><img src="images/Logout.jpg" width="100%" height="25" alt="jhhj" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr valign="middle">
    <td align="center" class="hh"><table width="100%" border="0">
      <tr>
         <td width="80%" bgcolor="#0099CC"><table width="100%" height="466" border="0" bgcolor = "#FFFFFF">
          <tr>
            <th height="48" align="left" valign="top" scope="col"><img src="Images/View Disease.png" width="180" height="46" alt="View Disease" /></th>
          </tr>
          <tr>
            <td height="28"><blockquote>
              <p><span class="style2">*The List of all Registered Diseases and their Information</span><br />
              </p>
              </blockquote>
             </td></tr>
          <tr>
          	<td align="left" valign="top">   <blockquote>
          	  <p class="style5"><span class="ww">
          	    <?php
		  			$Qry1 = "SELECT DiseaseID, DiseaseName, Causes, Symptoms, Treatment, RegDate from tblDisease";
					$Result = mysql_query($Qry1);
				   if (mysql_num_rows($Result) <= 0){
				     echo "There is no Diseases information available in the Database <br> <strong> No Diseases Available </strong>";
					 goto exit1;					 					 
					 } 	
					 echo "<table border = '1' >";
					 echo "<tr class = 'style6'><td align='center' valign='top'>Disease ID</td><td align='center' valign='top'>Disease Name</td><td align='center' valign='top'>Causes</td><td align='center' valign='top'>Symptoms </td><td align='center' valign='top'>Treatment</td><td align='center' valign='top'>Registration Date</td></tr>\n";
					while($myrow = mysql_fetch_array($Result))
					{
						extract($myrow);
						echo "<tr><td>$DiseaseID</td><td>$DiseaseName</td><td>$Causes</td><td>$Symptoms</td><td>$Treatment</td><td>$RegDate</td></tr>\n";
					}
				    echo "</table>"; 		
				    
			  												
 exit1:		
		  ?>
        	    </span></p>
            </blockquote></td>
          </tr>
          
          
        </table></td>
        
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