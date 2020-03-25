<?php
$base="http://localhost/newEra/";
/*PLease fill in here the relevant pw and username for your database, and of course replace the functions used with proper
connection functions for your database */

function	LogAsAdmin(){
	$link = @mysql_connect ("mysql2", "mbiowebadmin" , "thameswater")  or exit();    //connect to database
		mysql_select_db ("mbioweb") or exit();

                return $link;
}

function	LogAsGuest(){
	$link = @mysql_connect ("mysql2", "mbiowebuser" , "circustent")  or exit();    //connect to database
		mysql_select_db ("mbioweb") or exit();

                return $link;
}

$link = LogAsGuest();

?>
