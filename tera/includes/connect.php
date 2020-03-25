<?php
$base="http://www.era.rothamsted.ac.uk/";
/*PLease fill in here the relevant pw and username for your database, and of course replace the functions used with proper
connection functions for your database 



function	LogAsAdmin(){
	$link = @mysql_connect ("mysql1.rothamsted.ac.uk", "mbiowebadmin" , "thameswater")  or exit();    //connect to database
		mysql_select_db ("mbioweb") or exit();

                return $link;
}

function	LogAsGuest(){
	$link = @mysql_connect ("mysql1.rothamsted.ac.uk", "mbiowebuser" , "circustent")  or exit();    //connect to database
		mysql_select_db ("mbioweb") or exit();

                return $link;
}
*/

//function file for application
$Turbigo = "mysql1.rothamsted.ac.uk"; #:3306
$Napoleon = "DrPepper";
$Bonaparte = "Wh4tc4ng0wr0ng";
$Dfdniwie  = "CocaCola";
$Gs0tw = "1L1ke1t";
$ltwogd1yr = "eradoc";



ini_set('post_max_size','200M');
ini_set('upload_max_filesize','200M');
ini_set('max_execution_time','200M');
ini_set('max_input_time','200M');
ini_set('memory_limit','200M');
set_time_limit(65536);

function logasadmin ()
{
	global $Turbigo ;
	global $Napoleon ;
	global $Bonaparte ;
	global $ltwogd1yr ;
	$link = mysql_connect($Turbigo, $Napoleon, $Bonaparte) or die("Error Could not connect to Database: " . mysql_error()); //connect to database
	mysql_select_db($ltwogd1yr) or exit(); //select rrr database
	return $link;
}

function logasguest()
{
	global $Turbigo ;
	global $Dfdniwie ;
	global $Gs0tw ;
	global $ltwogd1yr ;
	$link = mysql_connect($Turbigo, $Dfdniwie, $Gs0tw) or die("Error Could not connect to Database: " . mysql_error()); //connect to database
	mysql_select_db($ltwogd1yr) or exit(); //select rrr database
	return $link;
}

$link = LogAsGuest();
  $isMember = "true";
  $LoggedIn = "1";
  $name = "anonymous";

?>
