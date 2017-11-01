<?php 
//session_start();
include("resources/dbconnect.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Add Diseases Page</title>
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
            <th height="48" align="left" valign="top" scope="col"><img src="Images/Add Disease.png" width="178" height="46" alt="Create User" /></th>
          </tr>
          <tr>
            <td height="24"><blockquote>
              <p><span class="style2">*Fill the form below with necessary informations</span><br/><span class="ww">
                <?php
		if(isset($_POST['BtnCreate'])){
			      $DiseaseID = $_POST['DiseaseID'];
				  $DiseaseName = $_POST['DiseaseName'];
				  $Causes = $_POST['Causes'];
				  $Symptoms = $_POST['Symptoms'];
				  $Treatment = $_POST['Treatment'];
				  $RegDate = $_POST['RegDate'];
				  if(empty($DiseaseName)) 
					{  echo "Please Ensure you supply the Disease Name in the textbox  <br>\n <strong> Unable to Create Disease Record </strong>"; 
					 goto exit1;
					}
					if(empty($Causes)) 
					{  echo "Please Ensure you supply the Causes in the textbox  <br>\n <strong> Unable to Create Disease Record </strong>"; 
					 goto exit1;
					}
					if(empty($Symptoms)) 
					{  echo "Please Ensure you supply the Symptoms <br>\n <strong> Unable to Create Disease Record </strong>"; 
					 goto exit1;
					}
					if(empty($RegDate)) 
					{  echo "Please Ensure you supply the Disease Registration Date in the textbox  <br>\n <strong> Unable to Create Disease Record </strong>"; 
					 goto exit1;
					}
					if(empty($Treatment)) 
					{  echo "Please Ensure you supply the disease Treatment <br>\n <strong> Unable to Create Disease Record </strong>"; 
					 goto exit1;
					}
							
				    $Query1 = "INSERT into tblDisease Values ('$DiseaseID', '$DiseaseName', '$Causes', '$Symptoms', '$Treatment', '$RegDate')";
				    if(mysql_query($Query1)) {
					echo "<script type = 'text/javascript'> \n";
					echo " alert('New Disease added with correct details successfully')";
					echo "</script>";
					echo " New Disease added with correct details successfully";
					//header('location: Add Diseases.php');
					 }
					else
					{ 
					echo "Your information could not be saved into Add Diseases table in the database";
					goto exit1;
					}			  
			  			  
			  			  
		} //end if isset
			  												
 exit1:		    
		   
		  
		  ?>
              </span><br />
              </p>
              </blockquote>
             </td></tr>
          <tr>
          	<td>   <blockquote>
              <table width="100%" height="305" border="0">
                <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('Surname','','R','Othername','','R','PhoneNo','','RisNum');return document.MM_returnValue">
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5"> Id:</span></td>
                      <td width="60%" scope="col" align="left"><span class="style5">
                        <?php
					  	$DiseaseID = "Disease";
		  	 	   		$Qry1 = "SELECT * from tblDisease";
				   		$Result = mysql_query($Qry1);
						$Num_Of_Record = mysql_num_rows($Result);
				   		if ($Num_Of_Record < 9){ $DiseaseID = $DiseaseID ."000".($Num_Of_Record + 1); }
						else if ($Num_Of_Record < 99){ $DiseaseID = $DiseaseID ."00".($Num_Of_Record + 1); }
						else if ($Num_Of_Record < 999){ $DiseaseID = $DiseaseID ."0".($Num_Of_Record + 1); }
						else if ($Num_Of_Record < 9999){ $DiseaseID = $DiseaseID.($Num_Of_Record + 1); }
					
					?>
                        <input name="DiseaseID" type="text" id="DiseaseID" size="20" readonly="readonly" value = "<?php echo $DiseaseID; ?>"/>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">Disease Name:</span></td>
                      <td align="left"><span class="style5">
                        <input name="DiseaseName" type="text" id="DiseaseName" size="50" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">Causes:</span></td>
                      <td align="left"><span class="style5">
                        <textarea name="Causes" id="Causes" cols="45" rows="5"></textarea>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5"> Symptoms:</span></td>
                      <td align="left"><span class="style5">
                        <textarea name="Symptoms" cols="45" rows="7" id="Symptoms"></textarea>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">Treatment:</span></td>
                      <td align="left"><span class="style5">
                        <textarea name="Treatment" id="Treatment" cols="45" rows="5"></textarea>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="40%" align="right" class="style1" scope="col"><span class="style5">Registration Date:</span></td>
                      <td align="left"><span class="style5">
                        <input name="RegDate" type="text" id="RegDate" size="40" />
                      </span></td>
                    </tr>                    
                    <tr>
                      <td class="style1">&nbsp;</td>
                      <td align="left"><span class="style5">
                        <input type="submit" name="BtnCreate" id="BtnCreate" value="Add Disease" />
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