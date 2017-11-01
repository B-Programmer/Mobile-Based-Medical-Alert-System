<?php 
//session_start();
include("resources/dbconnect.php");
function addPhoneCode($Phone)
{
	$PhoneNo = $Phone;
	if(strpos($PhoneNo, "0") == 0)//check if number start with zero as in 080.....
		$PhoneNo = "234".substr($PhoneNo, 1); //then add standard code as in 23480...
	return $PhoneNo;
	
}
function sendSMS($Sender, $RecipientPhoneNo, $Message)
{
	/******************************************************************************** Sample code for sending SMS through HTTP API.
Application granted only for adorableSMS customers. ********************************************************************************/
/* Variables with the values to be sent. */
$username="BProgrammer";
$password="123456";
/* create the required URL */
$url = "http://www.adorablesms.com/components/com_spc/smsapi.php?"
. "username=" . UrlEncode($username)
. "&password=" . UrlEncode($password)
. "&sender=" . UrlEncode($Sender)
. "&recipient=" . UrlEncode($RecipientPhoneNo)
. "&message=" . UrlEncode($Message);
/* call the URL */
$domain = file_get_contents($url);
print_r($domain);
if(strpos($domain, "OK")== 0)
{	echo "<script type = 'text/javascript'> \n";
	echo " alert('Your SMS successfully sent and will be delivered shortly')";
	echo "</script>"; 
	echo " Your SMS successfully sent";
}
else
	echo " Unable to send SMS";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Send SMS Page</title>
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
       <td width="11%"><a href="Add Doctor.php"><img src="images/Add_Doctor.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="11%"><a href="Add Diseases.php"><img src="images/Add_Diseases.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="13%"><a href="View User.php"><img src="images/View_User.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="13%"><a href="View Doctor.php"><img src="images/View_Doctor.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="13%"><a href="View Diseases.php"><img src="images/View_Diseases.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="13%"><a href="View Feedback.php"><img src="images/View_Feedback.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="13%"><a href="Send SMS.php"><img src="images/Send_SMS.jpg" width="100%" height="25" alt="us" /></a></td>
       <td width="13%"><a href="Signin Page.php"><img src="images/Logout.jpg" width="100%" height="25" alt="jhhj" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr valign="middle">
    <td align="center" class="hh"><table width="100%" border="0">
      <tr>
        <td width = "18%"></td>
        <td width="64%" bgcolor="#0099CC"><table width="100%" height="521" border="0" bgcolor = "#FFFFFF">
          <tr>
            <th height="48" align="left" valign="top" scope="col"><img src="Images/Send SMS.png" width="178" height="46" alt="Send SMS" /></th>
          </tr>
          <tr>
            <td height="24"><blockquote>
              <p><span class="style2">*To send SMS for a specific Disease select the Disease ID with other necessary informations</span><br/><span class="ww">
                <?php
		if(isset($_POST['BtnSend'])){
			      $DiseaseID = $_POST['DiseaseID'];
				  $DiseaseName = $_POST['DiseaseName'];
				  $Sender = $_POST['Sender'];
				  $SendTo = $_POST['SendTo'];
				  
				  if(empty($DiseaseID)) 
					{  echo "Please Ensure you select the Disease ID in the List  <br>\n <strong> Unable to Send SMS </strong>"; 
					 goto exit1;
					}
				  if(empty($DiseaseName)) 
					{  echo "Please Ensure you supply the Disease Name in the textbox  <br>\n <strong> Unable to Send SMS </strong>"; 
					 goto exit1;
					}
					if(empty($Sender)) 
					{  echo "Please Ensure you supply the Sender in the textbox  <br>\n <strong> Unable to Send SMS </strong>"; 
					 goto exit1;
					}
					if(empty($SendTo)) 
					{  echo "Please Ensure you supply the SendTo <br>\n <strong> Unable to Send SMS </strong>"; 
					 goto exit1;
					}
					$RecipientPhoneNo = "";
					if($SendTo == "Users Only") 
					{
						//retrieve all users' PhoneNo only
						$Qry1 = "SELECT PhoneNo from tblUser";
				   		$Result = mysql_query($Qry1);
				   		if (mysql_num_rows($Result) <= 0){
				     		echo "There is no users' phone numbers available in the database!!! <br> <strong> No Recipients' Phone Numbers</strong>";
					 		goto exit1;					 					 
					 	} 	
					 	while($myrow = mysql_fetch_array($Result, MYSQL_ASSOC)){
					 		//extract($myrow);
							$PhoneNo = $myrow['PhoneNo'];
							$RecipientPhoneNo = $RecipientPhoneNo.addPhoneCode($PhoneNo).",";
					 	}					 
					}
					else if($SendTo == "Doctors Only") 
					{
						//retrieve all doctors' PhoneNos only
						$Qry1 = "SELECT PhoneNo from tblDoctor";
				   		$Result = mysql_query($Qry1);
				   		if (mysql_num_rows($Result) <= 0){
				     		echo "There is no doctors' phone numbers available in the database!!! <br> <strong> No Recipients' Phone Numbers</strong>";
					 		goto exit1;					 					 
					 	} 	
					 	while($myrow = mysql_fetch_array($Result, MYSQL_ASSOC)){
					 		//extract($myrow);
							$PhoneNo = $myrow['PhoneNo'];
							$RecipientPhoneNo = $RecipientPhoneNo.addPhoneCode($PhoneNo).",";
					 	}					 
					}
					else //if($SendTo == "Both Doctors and Users Only") 
					{
						//retrieve all users' PhoneNo 
						$Qry1 = "SELECT PhoneNo from tblUser";
				   		$Result = mysql_query($Qry1);
				   		if (mysql_num_rows($Result) <= 0){
				     		echo "There is no users' phone numbers available in the database!!! <br> <strong> No Recipients' Phone Numbers</strong>";
					 		goto exit1;					 					 
					 	} 	
					 	while($myrow = mysql_fetch_array($Result, MYSQL_ASSOC)){
					 		//extract($myrow);
							$PhoneNo = $myrow['PhoneNo'];
							$RecipientPhoneNo = $RecipientPhoneNo.addPhoneCode($PhoneNo).",";
					 	}
						//retrieve all doctors' PhoneNos
						$Qry1 = "SELECT PhoneNo from tblDoctor";
				   		$Result = mysql_query($Qry1);
				   		if (mysql_num_rows($Result) <= 0){
				     		echo "There is no doctors' phone numbers available in the database!!! <br> <strong> No Recipients' Phone Numbers</strong>";
					 		goto exit1;					 					 
					 	} 	
					 	while($myrow = mysql_fetch_array($Result, MYSQL_ASSOC)){
					 		//extract($myrow);
							$PhoneNo = $myrow['PhoneNo'];
							$RecipientPhoneNo = $RecipientPhoneNo.addPhoneCode($PhoneNo).",";
					 	}					 
					}
					//trim the recipient phone no and remove the last comma if present
					if(substr($RecipientPhoneNo, strlen($RecipientPhoneNo)-1) == ",")
					{
						//remove the comma
						$RecipientPhoneNo = substr($RecipientPhoneNo, 0, strlen($RecipientPhoneNo)-1);
						//echo $RecipientPhoneNo;
					}
					$Message = "Medical Alert: A Disease: ".$DiseaseName. " is a contagious and lethal disease. please visit our website for more info. @mbmas.com";
				    sendSMS($Sender, $RecipientPhoneNo, $Message);
					//echo "<script type = 'text/javascript'> \n";
					//echo " alert('New Disease added with correct details successfully')";
					/*echo "</script>"; */
					//header('location: Send SMS.php');
								  
			  			  
			  			  
		} //end if isset
			  												
 exit1:		    
		   
		  
		  ?>
              </span><br />
              </p>
              </blockquote>
             </td></tr>
          <tr>
          	<td>   <blockquote>
              <table width="108%" height="305" border="0">
                <form action="" method="post" name="form1" id="form1" onSubmit="MM_validateForm('Surname','','R','Othername','','R','PhoneNo','','RisNum');return document.MM_returnValue">
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5"> Id:</span></td>
                      <td width="60%" scope="col" align="left"><span class="style5">
                        <select name="DiseaseID" id="DiseaseID">
                          <?php
		  	 	   //this code load all DiseaseID
				   if((isset($_POST['BtnSelect'])) || (isset($_POST['BtnSend']))){
					$DiseaseID = $_POST['DiseaseID'];
					echo "<Option Value = '$DiseaseID'>$DiseaseID</option>\n";
				   }
				  else {
				   		$Qry1 = "SELECT DiseaseID from tblDisease";
				   		$Result = mysql_query($Qry1);
				   		if (mysql_num_rows($Result) <= 0){
				     		echo "<option Value = 'No'> No Disease Available </option>";
					 		goto exit11;
					 					 
					 	} 	
					 	while($myrow = mysql_fetch_array($Result))
						{
							extract($myrow);
							echo "<Option Value = '$DiseaseID'>$DiseaseID</option>\n";
						}
				     
				   }
 exit11:		    
		    
		  ?>
                        </select>
                        <input type="submit" name="BtnSelect" id="BtnSelect" value="Select Disease ID" />
                        <?php
   if(isset($_POST['BtnSelect']) ){
			      $DiseaseID = $_POST['DiseaseID'];
				   if(empty($DiseaseID)) 
					{  echo "You've not selected any Disease ID <br>\n <strong> Unable to retrieve Disease Name </strong>"; 
					 goto exit12;
					}

			       $Qry1 = "SELECT DiseaseName from tblDisease Where DiseaseID  = '".$DiseaseID."'";
				   $Result = mysql_query($Qry1);
				   if (mysql_num_rows($Result) <= 0){
				     echo "There is no such Disease with ID: $DiseaseID available in the Disease!!! <br> <strong> No Such Disease Available $DiseaseID</strong>";
					 goto exit12;
					 					 
					 } 	
					 $myrow = mysql_fetch_array($Result);
					 extract($myrow);
					$today = time();
					 $SMSdate = date("d-M-Y", $today);
					 
					 
 exit12:		    
		}
				   
		  ?>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">Disease Name:</span></td>
                      <td align="left"><span class="style5">
                        <input name="DiseaseName" type="text" id="DiseaseName" value="<?php if(!(empty($DiseaseName))) echo $DiseaseName; else echo ''; ?>" size="50" readonly="readonly" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">Sender:</span></td>
                      <td align="left"><span class="style5">
                        <input name="Sender" type="text" id="Sender" value="MBMAS" size="11" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5"> Send To:</span></td>
                      <td align="left"><span class="style5">
                        <select name="SendTo" id="SendTo">
                          <option value="Users Only" selected>Users Only</option>
                          <option value="Doctors Only">Doctors Only</option>
                          <option value="Both Doctors and Users">Both Doctors and Users</option>
                          </select>
                      </span></td>
                    </tr>                    
                    <tr>
                      <td class="style1">&nbsp;</td>
                      <td><span class="style5">
                        <input type="submit" name="BtnSend" id="BtnSend" value="Send SMS" />
                        <input type="reset" name="BtnCancel" id="BtnCancel" value="Reset" />
                        </span></td>
                    </tr>
                  </form>
                </table>
              <p class="style5">&nbsp;</p>
            </blockquote></td>
          </tr>
          
          <tr>
            <td><blockquote><br /></blockquote></td>
          </tr>
        </table></td>
        <td width = "18%"></td>
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