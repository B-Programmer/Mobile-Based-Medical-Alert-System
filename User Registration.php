<?php 
session_start();
include("resources/dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Registration Page</title>
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
        <td width="60%" bgcolor="#0099CC"><table width="100%" height="466" border="0" bgcolor = "#FFFFFF">
          <tr>
            <th height="48" align="left" valign="top" scope="col"><img src="Images/Create User.png" width="178" height="46" alt="Create User" /></th>
          </tr>
          <tr>
            <td height="28"><blockquote>
              <p><span class="style2">*Fill the form below with necessary informations</span><br/>
              <span class="ww">
                <?php
		  	 	  if(isset($_POST['BtnCreate'])){
			      $UserID = $_POST['UserID'];
				  $UserName = $_POST['UserName'];
				  $Address = $_POST['Address'];
				  $Sex = $_POST['Sex'];
				  $EmailAddress = $_POST['EmailAddress'];
				  $PhoneNo = $_POST['PhoneNo'];
				  $RegDate = $_POST['RegDate'];
				  $Age = $_POST['Age'];
				  $Password = $_POST['Password'];

					if(empty($UserName)) 
					{  echo "Please Ensure you supply the User's Name in the textbox  <br>\n <strong> Unable to Create User </strong>"; 
					 goto exit1;
					}
					if(empty($Sex)) 
					{  echo "Please Ensure you select or set the approriate User's Sex <br>\n <strong> Unable to Create User </strong>"; 
					 goto exit1;
					}
					if(empty($EmailAddress)) 
					{  echo "Please Ensure you supply the User's Email Address in the textbox  <br>\n <strong> Unable to Create User </strong>"; 
					 goto exit1;
					}
					if(empty($PhoneNo)) 
					{  echo "Please Ensure you type User's Phone Number <br>\n <strong> Unable to Create User </strong>"; 
					 goto exit1;
					}
					if(empty($Age)) 
					{  echo "Please Ensure you type User's Age <br>\n <strong> Unable to Create User </strong>"; 
					 goto exit1;
					}
							
				    $Query1 = "INSERT into tblUser Values ('$UserID', '$UserName', '$Address', '$Sex', '$EmailAddress', '$PhoneNo', '$RegDate', $Age, '$Password')";
				    if(mysql_query($Query1)) {
					echo "<script type = 'text/javascript'> \n";
					echo " alert('New User created with correct details successfully')";
					echo "</script>";
					header('location: User login.php');
					 }
					else
					{ 
					echo "Your information could not be saved into User table in the database";
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
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">User Id:</span></td>
                      <td width="63%" scope="col" align="left"><span class="style5">
                        <?php
					  	$UserID = "User";
		  	 	   		$Qry1 = "SELECT * from tblUser";
				   		$Result = mysql_query($Qry1);
						$Num_Of_Record = mysql_num_rows($Result);
				   		if ($Num_Of_Record < 9){ $UserID = $UserID ."000".($Num_Of_Record + 1); }
						else if ($Num_Of_Record < 99){ $UserID = $UserID ."00".($Num_Of_Record + 1); }
						else if ($Num_Of_Record < 999){ $UserID = $UserID ."0".($Num_Of_Record + 1); }
						else if ($Num_Of_Record < 9999){ $UserID = $UserID.($Num_Of_Record + 1); }
					
					?>
                        <input name="UserID" type="text" id="UserID" size="20" readonly="readonly" value = "<?php echo $UserID; ?>"/>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">Name:</span></td>
                      <td align="left"><span class="style5">
                        <input name="UserName" type="text" id="UserName" size="40" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">Address:</span></td>
                      <td align="left"><span class="style5">
                        <textarea name="Address" id="Address" cols="45" rows="5"></textarea>
                      </span></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">Sex:</span></td>
                      <td align="left"><select name="Sex" id="Sex">
                        <option selected="selected">MALE</option>
                        <option>FEMALE</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">E-mail Address:</span></td>
                      <td align="left"><span class="style5">
                        <input name="EmailAddress" type="text" id="EmailAddress" size="50" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">Phone No.:</span></td>
                      <td align="left"><span class="style5">
                        <input name="PhoneNo" type="text" id="PhoneNo" size="15" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">Registration Date:</span></td>
                      <td align="left"><span class="style5">
                        <input name="RegDate" type="text" id="RegDate" size="40" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5">Age:</span></td>
                      <td align="left"><span class="style5">
                        <input name="Age" type="text" id="Age" size="10" />
                      </span></td>
                    </tr>
                    <tr>
                      <td width="37%" align="right" class="style1" scope="col"><span class="style5"> Password:</span></td>
                      <td align="left"><span class="style5">
                        <input name="Password" type="password" id="Password" size="40" />
                      </span></td>
                    </tr>                    
                    <tr>
                      <td class="style1">&nbsp;</td>
                      <td align="left"><span class="style5">
                        <input type="submit" name="BtnCreate" id="BtnCreate" value="Create User" />
                        <input type="reset" name="BtnCancel" id="BtnCancel" value="Cancel" />
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