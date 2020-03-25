<?php
/*
This is an example of form for registering.
This assumes that the database has a User table with the following fields:
 `UserID`, `Username`, `fname`, `iname`, `lname`, `UserEmail`, `OreganoNumber`, `DivisionID`, `UserMembershipStatusID`,  `UserMembershipTypeID`
and the following two tables

UserMembershipStatus
UserMembershipStatusID 1 Full 			  A full member has passed moderation
2 Waiting 		  When a member is awaiting acceptance of registrati...
3 Removed 		  When membership is removed to a member (banned) ba


UserMembershipTypes

UserMembershipTypeID 1 Guest 			 A guest user is a user that has not yet had his me...
2 Default 		     Default user, no major priviledges
3 Moderator 		 Moderator has some priviledged on users
4 Owner 			 Has all priviledges

This is only a suggestion. Amend the SQLs with the requirements of your application.
Remember that Camel only links one application to one User, and logs them in (puts a cookie)
it is up to the application to differenciate between users which are banned, owners or not yet registered.
This systems record users are default, until the moderator changes them to something else...

*/
foreach($_GET as $sk => $sv)
{     
      $$sk = $sv;
}
foreach($_POST as $sk => $sv)
{     
      $$sk = $sv;
}
if ($Next == "Cancel")
{
  $area="home";
  $page="index";
  $to = "http://local-info.rothamsted.ac.uk/departments/bab/era/newEra/index.php?area=home";
header('Location: '. $to);
}
require_once('includes/connect.php'); 		//Connect to database
require_once('includes/user.php');  		//includes code to check user. At the end of that, user is logged in and username and name is set...
require_once('includes/settings.php'); 		//includes settings for page or area
require_once('includes/functions.php'); 		//includes functions to write different html snippets from variable
require_once('includes/header.php'); 		//includes header for area
include ('includes/bioweb.class.php'); 		//Most functions could be encapsulated in class...

$link = LogAsGuest();

if (!$nbStep)	{
  $nbStep=1;

}

$isFinished="true";		//initialise the value that will make the finish button appear.

If ($Next == "Back")	{
	$nbStep = $nbStep - 1 ;
}
if ( $Next == "Next")	{
	$nbStep = $nbStep + 1;
}
if ( $Next == "Finish")	{
	$nbStep = $nbStep + 1;
}

if ($Finish == "Finish")		{
	$nbStep = 3;
}

if ($nbStep == 3)	{

	  //Add user to database
	  /*
	  UserID  Username  EncodedPassword  fname  iname  lname  IsRothamsted  EmailAddress  DivisionID  AddressID  Extension  FaxNumber  UserMembershipStatusID  UserMembershipTypeID
	        1 castells e1000yb Nathalie I Castells-Brooke 1 nathalie.castells@bbsrc.ac.uk 13 1 2496 +44 (1582)760981 1 4

	  Locations: LocationID  LocationName  Address1  Address2  Town  PostCode  CountryID  PhoneNumber  isStoreLocation
	  */
	  echo ("<div id=\"mainbody\">");

	  $link = LogAsAdmin();
	  if ($LocationName)
	  {
	  $sqlLoc = "insert into `eraLocations` (`LocationID`,  `LocationName`,  `Address1`,  `Address2`,  `Town`,  `PostCode`,  `CountryID`) values ('".$LocationID."',  '".$LocationName."',  '".$Address1."',  '".$Address2."',  '".$Town."',  '".$PostCode."',  '".$CountryID."')";
	  $result = mysql_query($sqlLoc);
	  $AddressID = mysql_insert_id();
	  }
	  else
	  {
	  $AddressID = $LocationID;
	  }
	  //echo $AddressID;
	  $sql="INSERT INTO `eraUsers` (`UserID`, `Username`, `EncodedPassword`, `fname`, `iname`, `lname`, `IsRothamsted`, `EmailAddress`, `DivisionID`, `AddressID`, `PhoneNumber`, `Extension`, `FaxNumber`, `UserMembershipStatusID`, `UserMembershipTypeID` ) VALUES       ('',    '".$Username."', '".$EncodedPassword."',  '".$fname."',  '".$iname."',  '".$lname."',  '".$IsRothamsted."',  '".$EmailAddress."',  '".$DivisionID."',  '".$AddressID."','".$PhoneNumber."',  '".$Extension."', '".$FaxNumber."',  '2', '2')";
	  //echo $sql;
	  $result = mysql_query($sql);

	  ?>
	  <h2>Thank you, you can <a href="index.php?area=home&page=login&nbStep=1&name=<?=$Username?>&pass=<?=$pw?>&Next=Submit">enter</a> now</h2>
  <?php
}
else
{
	?>
	<div id="mainbody">
	<center>
	<h1>
	e-RA Registration Form
	</h1>
	<form method=get action="<?=$PHP_SELF?>" autocomplete=on name=login_form onsubmit="">
	<input name="nbStep" type="hidden" value="<?=$nbStep?>">
	<table bgcolor="#666600" border="0" cellpadding="2" cellspacing="0">
	<tr><td>
	<table bgcolor="#eeeeee" border="0" cellpadding="2" cellspacing="0">
	<tr><td bgcolor="#ffffff" align="center">
	<table border="0" cellspacing="6" cellpadding="6" bgcolor="ffffff">
	<tr bgcolor="#eeeeee"><td align="center">
	<table border="0" cellpadding="4" cellspacing="0">
	<tr><td align="right">
	<table border="0" cellpadding="2" cellspacing="0">
	<?php
	if ($nbStep == 1)	{

	?>

	<tr>
		<td align="right" nowrap><font face="arial" size="-1">First Name*:</font></td>
		<td><input name="fname" size="17" maxlength="32" value="<?=$fname?>"></td>
	</tr>
	<tr>
		<td align="right" nowrap><font face="arial" size="-1">Initial:</font></td>
		<td><input name="iname" size="17" maxlength="32" value="<?=$iname?>"></td>
	</tr>
																							<tr>
	<tr>
		<td align="right" nowrap><font face="arial" size="-1">Last Name*:</font></td>
		<td><input name="lname" size="17" maxlength="32" value="<?=$lname?>"></td>
	</tr>
	<tr>
		<td align="right" nowrap><font face="arial" size="-1">Username*:</font></td>
		<td><input name="Username" size="17" maxlength="32" value="<?=$Username?>"><br><font size="-1"><i>Example: your NT logon username</i></font></td>
	</tr>
	<tr>
		<td align="right" nowrap><font face="arial" size="-1">Your Password*:</font></td>
		<td><input type="password" name="pw" size="17" maxlength="32" value="<?=$pw?>"></td>
	</tr>
	<tr>
		<td align="right" nowrap><font face="arial" size="-1">Retype Password*:</font></td>
		<td><input type="password" name="pw2" size="17" maxlength="32" value="<?=$pw2?>"></td>
	</tr>
	<tr>
		<td align="right" nowrap><font face="arial" size="-1">Email Address*:</font></td>
		<td><input name="EmailAddress" size="17" maxlength="32" value="<?=$EmailAddress?>"></td>
	</tr>
	<tr><td align="right" nowrap><font face="arial" size="-1">Rothamsted Research?:</font></td>
		<td><?php

	        ListBox ("Divisions", "DivisionID", "Division", $ID)
	        ?><br>
	        <font size="-1">Please select your Department</font></td>
	</tr>
	<tr><td align="right" nowrap><font face="arial" size="-1">Post Code*:</font></td>
		<td><input name="PostCode" size="17" maxlength="32" value="<?=$PostCode?>"></td>
	</tr>
	<tr>
		<td>&nbsp; 	</td>
		<td>

		<input name="Next" type="submit" value="Next">
		<input name="Next" type="submit" value="Cancel">
		</td>
	</tr>
	</table></td></tr></table></td></tr>
	</table></td></tr></table></td></tr></table>

	</form> </center>
	</div>
	<?php
	}



	if	($nbStep == 2)	
	{
		//Check Last Name
		$sql = "SELECT * FROM `eraUsers` WHERE `fname` = '".$fname."' and  `lname` = '".$lname."';";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
	
		if (!$result)		{
			print ("query failed");
		} else	{
			if ($num_rows > 0)	{
			$isFinished="false";
	
		?>
		                      <font size="-1"><font color=red>Warning</font>: <?=$fname?> <?=$lname?> already registered <br><hr>
	
		<?php
	
		}
	
		}
	
		//Check Username
		$sql = "SELECT * FROM `eraUsers` WHERE `Username` = '$Username'";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
	
		if (!$result)		{
			print ("query failed");
		} else	{
			if ($num_rows > 0)	{
		 	?>
		<font size="-1"><font color=red>Warning</font>: <?=$Username?> already used <br><hr>
	
			<?php
			$isFinished="false";
		}
		}
		?>
	
		<tr>
			<td align="right" nowrap><font face="arial" size="-1">First Name:</font></td>
	
		<td>
		<?php
		if ($fname=="First Name")	{
			$isFinished = "false";
			echo("<font color=\"red\">Not Entered</font>");
		} else	{
	
			echo($fname);
			echo("<input type=\"hidden\" name=\"fname\" value=\"$fname\">");
		}
		?>
		</td>
		</tr>
		<tr>
			<td align="right" nowrap><font face="arial" size="-1">Initial:</font></td>
			<td>
		 <?php
		if ($iname=="Initial")	{
		        $iname = " ";
		}
		echo($iname);
		echo("<input type=\"hidden\" name=\"iname\" value=\"$iname\">");
		?>
		</td>
		</tr>
		<tr>
			<td align="right" nowrap><font face="arial" size="-1">Last Name:</font></td>
			<td>
		<?php
		if ($lname=="Last Name")	{
			$isFinished = "false";
			echo("<font color=\"red\">Not Entered</font>");
		} else	{
			echo $lname;
			echo("<input type=\"hidden\" name=\"lname\" value=\"$lname\">");
		}
	
		?>
		</td>
		</tr>
		<tr>
			<td align="right" nowrap><font face="arial" size="-1">Username:</font></td>
			<td>
		<?php
		if ($Username=="Username")	{
			$isFinished = "false";
			echo("<font color=\"red\">Not Entered</font>");
		} else	{
			echo($Username);
			echo("<input type=\"hidden\" name=\"Username\" value=\"$Username\">");
		}
		?>
																																						</tr>
		<tr>
			<td align="right" nowrap><font face="arial" size="-1">Your Password:</font></td>
			<td>
		<?php
		if ($pw != $pw2) {
		        	echo("<font color=\"red\">Passwords do not match</font>");
		} else   {
		        $EncodedPassword = sha1($pw);
		        echo $pw;
			echo("<input type=\"hidden\" name=\"EncodedPassword\" value=\"$EncodedPassword\">");
				echo("<input type=\"hidden\" name=\"pw\" value=\"$pw\">");
	
		}
		?>
		</tr>
		<tr> 
		<td align="right" nowrap><font face="arial" size="-1">
		Email Address:</font></td><td>
		<?php
		if ($EmailAddress =="your.name")	{
			$isFinished = "false";
			echo("<font color=\"red\">Not Entered</font>");
		} else	{
	
			echo($EmailAddress);
			echo("<input type=\"hidden\" name=\"EmailAddress\" value=\"$EmailAddress\">");
		}
		?>
		</td>
		</tr>
		<?php
		if ($DivisionID > 0)
		{
			$DivisionName = GetWhat ("eraDivisions", "DivisionID", "Division", $DivisionID);
			?>
			<tr>
			<td align="right" valign="top" nowrap><font face="arial" size="-1">Department:</font></td>
			</td>
                        <td align="left">
                        <?=$DivisionName?>
			<input type="hidden" name="DivisionID" value="<?=$DivisionID?>">
			<input type="hidden" name="IsRothamsted" value="1">
			</td>
			</tr>
			<?php
		}
		else
		{
		     	$IsRothamsted = 0;
		}
		?>
		<tr>
		<td align="right" nowrap><font face="arial" size="-1">Address:</font></td>
		<td>
		</td>
		</tr>
		<?php //search if post code exists in database
		//eraLocations: LocationID  LocationName  Address1  Address2  Town  PostCode  CountryID  PhoneNumber  isStoreLocation
		$PostCode = strtoupper ($PostCode);
		$sqlAddress = "Select * from `eraLocations` where `PostCode` = '$PostCode'";
		$results = mysql_query($sqlAddress);
		$num_rows = mysql_num_rows($results);
		if (!$results)
		{
			print ("query failed");
		}
		else
		{
 			if ($num_rows > 0)
			{
				?>
				<tr>
				<td align="right" valign="top" nowrap><font face="arial" size="-1">Choose one Or fill in a new address for that post code:</font>
				</td>
				<td align="left">
				<font size="-2">
				<?php
				while ($result = mysql_fetch_array($results))
				{
					?>
					<INPUT  TYPE="RADIO" NAME="LocationID" VALUE="<?=$result['LocationID']?>" >
					<?php
					if ($result['LocationName']) 
					{
						echo ("<font size=\"-2\"><b>".$result['LocationName']."</b>");
						echo ("; ");
					}
					if ($result['Address1']) 
					{
						echo $result['Address1'];
						echo ("; ");
					}
					if ($result['Address2']) 
					{
						echo $result['Address2'];
						echo ("; ");
					}
					if ($result['Town']) 
					{
						echo $result['Town'];
						echo ("; ");
					}
					if ($result['PhoneNumber']) 
					{
						echo  $result['PhoneNumber'];
						echo ("<br>");
					}
					$Town = $result['Town'];
					$CountryID = $result['CountryID'];
					$CountryName = GetWhat ('Countries', 'CountryID', 'CountryName', $CountryID)
					?>
					</INPUT>
					<br>
					<?php
				}
			}
		}

		?>
		</td>
		 <tr>   
			<td align="right" nowrap></td>
			<td><font face="arial" size="-2">Research Center Name*:</font><input type="text" name="LocationName" size="17" maxlength="32" value="<?php echo($LocationName)?>"></td>
			<input type="hidden" name="IsRothamsted" value="1">
		</tr>
		<tr>
			<td align="right" nowrap></td>
			<td><font face="arial" size="-1">Address:</font><input type="text" name="Address1" size="17" maxlength="32" value="<?php echo($Address1)?>"></td>
		</tr>
		<tr>
			<td align="right" nowrap></td>
			<td><font face="arial" size="-1">Address:</font><input type="text" name="Address2" size="17" maxlength="32" value="<?php echo($Address2)?>"></td>
		</tr>
		<tr>
			<td align="right" nowrap></td>
			<td><font face="arial" size="-1">Town:</font><input type="text" name="Town" size="17" maxlength="32" value="<?php echo($Town)?>"></td>
		</tr>
		<tr><td align="right" nowrap></td>
			<td>
			<font face="arial" size="-1">Post Code:</font><input type="text" name="PostCode" size="17" maxlength="32" value="<?=$PostCode?>"></td>
		<tr>
			<td align="right" nowrap></td>
			<td><font face="arial" size="-1">Country:</font>
		        <?php
		          ListBox ('Countries', 'CountryID', 'CountryName', $CountryID);
		        ?>
		        </td>
		</tr>
		<tr>
			<td align="right" nowrap></td>
			<td><font face="arial" size="-1">Phone Number:</font><input type="text" name="PhoneNumber" size="17" maxlength="32" value="<?php echo($PhoneNumber)?>"></td>
		</tr>
		<tr>
			<td align="right" nowrap><font face="arial" size="-1">Phone Extension if applicable:</font></td>
			<td><input type="text" name="Extension" size="17" maxlength="32" value="<?php echo($Extension)?>"></td>
		</tr>
		<tr>
			<td align="right" nowrap><font face="arial" size="-1">Fax Number:</font></td>
			<td><input type="text" name="FaxNumber" size="17" maxlength="32" value="<?php echo($FaxNumber)?>"></td>
		</tr>
		</td>
		</tr><tr><td>&nbsp;</td><td>
		<?php
		if ($isFinished=="true")	
		{
			?>
			<input name="Next" type="submit" value="Finish">
			<?php
		}	
		else
		{
			echo ("<font size=\"-1\"><font color=#ff0000>This is incomplete, please go back or abort</font></font><br>");
		}
		?>
	
		<input type=submit name="Next" value="Back" ONCLICK="self.history.back();">
		<input type=submit name="Next" value="Cancel">
		</td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table>
		</form>
		</center>
		<?php
	}

}
?>
