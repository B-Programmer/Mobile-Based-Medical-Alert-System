<?php 
session_start();
include("resources/dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Feedback</title>
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
        <td width = "20%">&nbsp;</td>
        <td width="60%" bgcolor="#0099CC"><table width="100%" height="521" border="0" bgcolor = "#FFFFFF">
          <tr>
            <th height="48" align="left" valign="top" scope="col"><img src="Images/Feedback.png" width="178" height="46" alt="Feedback" /></th>
          </tr>
          <tr>
            <td height="24"><blockquote>
              <p><span class="style2">*Fill the feedback form below with necessary informations</span><br />
              </p>
              </blockquote>
             </td></tr>
          <tr>
          	<td>   <blockquote><span class="style5">
          	  <?php
		  	 	   $Qry1 = "SELECT UserName from tblUser WHERE UserID = '" .$_SESSION['UserID']."'";
				   $Result = mysql_query($Qry1);
				   if (mysql_num_rows($Result) <= 0){
				     echo "There is no user details available in the Database <br> <strong> No User Available </strong>";
					 exit;
					 					 
					 } 	
					 
					$myrow = mysql_fetch_array($Result);
					 extract($myrow);
					
  												
   
		  ?>
          	</span>
              <table width="100%" height="305" border="0">
                <form action="" method="post" name="form1" id="form1" >
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5"> Id:</span></td>
                      <td width="60%" scope="col" align="left"><span class="style5">
                        <input name="UserID" type="text" id="UserID" size="40" readonly="readonly" value = "<?php echo $_SESSION['UserID']; ?>"/>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">User Name:</span></td>
                      <td align="left"><span class="style5">
                        <input name="UserName" type="text" id="UserName" value="<?php echo $UserName;?>" size="40" readonly="readonly" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">Feedback:</span></td>
                      <td align="left"><span class="style5">
                        <textarea name="Feedback" id="Feedback" cols="45" rows="7"></textarea>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5"> Date:</span></td>
                      <td align="left"><span class="style5">
                        <input name="FeedbackDate" type="text" id="FeedbackDate" size="40" />
                        </span></td>
                    </tr>                    
                    <tr>
                      <td class="style1">&nbsp;</td>
                      <td align="left"><span class="style5">
                        <input type="submit" name="BtnCreate" id="BtnCreate" value="Send Feedback" />
                        <input type="reset" name="BtnReset" id="BtnReset" value="Reset" />
                      </span></td>
                    </tr>
                  </form>
                </table>
              <p class="style5"><span class="ww">
                <?php
		  	 	  if(isset($_POST['BtnCreate'])){
			      $UserID = $_POST['UserID'];
				  $UserName = $_POST['UserName'];
				  $Feedback = $_POST['Feedback'];
				  $FeedbackDate = $_POST['FeedbackDate'];
				  if(empty($Feedback)) 
					{  echo "Please Ensure you supply the User Feedback in the textbox  <br>\n <strong> Unable to Send User Feedback </strong>"; 
					 goto exit1;
					}
					if(empty($FeedbackDate)) 
					{  echo "Please Ensure you supply the User Feedback Date in the textbox  <br>\n <strong> Unable to Send User Feedback </strong>"; 
					 goto exit1;
					}
							
				    $Query1 = "INSERT into tblUserFeedback Values ('$UserID', '$UserName', '$Feedback', '$FeedbackDate')";
				    if(mysql_query($Query1)) {
					echo "<script type = 'text/javascript'> \n";
					echo " alert('Your feedback has been successfully sent. Thanks for using this App.')";
					echo "</script>";
					echo "Your feedback has been successfully sent. Thanks for using this App.";
					//header('location: View Diseases_1.php');
					 }
					else
					{ 
					echo "Your feedback information could not be sent.";
					goto exit1;
					}			  
			  			  
			  			  
		} //end if isset
			  												
 exit1:		    
		   
		  
		  ?>
</span></p>
            </blockquote></td>
          </tr>
          
          <tr>
            <td><blockquote><br /></blockquote></td>
          </tr>
        </table></td>
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