<?php
// restricted access controls
#$request  = str_replace("/envato/pretty/php/", "", $_SERVER['REQUEST_URI']);
$request = $_SERVER['REQUEST_URI'];
#split the path by '/'
$params     = explode("/", $request);
$isMember = "true";
$LoggedIn = "1";
$name = "anonymous";


$Web_base = "http://local-info.rothamsted.ac.uk/eRA/tera/"; 

$DETin = "http://burdock.rothamsted.ac.uk/pgera/extract/pages/data_extraction_prototype6.html";
$DETout = "http://www3.rothamsted.ac.uk/cdera/extract/pages/data_extraction_prototype6.html";

$det = $DETin;

$isMember = "true";
$LoggedIn = "1";
$name = "anonymous";

//test positions
if (!$name) {
	$name="Guest";
}
//This puts the query string into a cookie: could be usefull to keep place or settings

$date = date("D F j, Y");

//Set Web site variables here Variable base is in the relevant connect file

//People involved in project.... Now may be that can be help in the actual database

$Web_Author[Name] = "Nathalie Castells-Brooke";
$Web_Author[Email] = "mailto:nathalie.castells@rothamsted.ac.uk";

$Era_Curator[Name] = "Margaret Glendinning and Sarah Perryman";
$Era_Curator[Email] = "mailto:era@rothamsted.ac.uk";

$Era_Developer[Name] = "Nathalie Castells-Brooke";
$Era_Developer[Email] = "mailto:nathalie.castells@rothamsted.ac.uk";

$nextURL = "index.php?area=$area&amp;page=";
$PictureFolfer= $base."pictures/";

$pixContactURL = "mailto:nicola.seymour@rothamsted.ac.uk";
$pixContactTitle = "Visual Communication Unit at Rothamsted";

if ( strpos ($image, "/met/") >0 ) {
	$pixContactURL = "mailto:tony.scott@rothamsted.ac.uk";
	$pixContactTitle = "Tony Scott";
}



/****************************  *************/

if (!$style) {
	$style="index";
} //to pick up the default style sheet



if ($page!= "") {
	;
}	else	{
	$page = "index";
}




/*the index pf Pagetitle is the variable $page (which is also the name of the file)*/
$alphabet = array(
1 => "a",
2 => "b",
3 => "c",
4 => "d",
5 => "e",
6 => "f",
7 => "g",
8 => "h",
9 => "i",
10 => "j",
11 => "k",
12 => "l",
13 => "m",
14 => "n",
15 => "o",
16 => "p",
17 => "q",
18 => "r",
19 => "s",
20 => "t",
21 => "u",
22 => "v",
23 => "w",
24 => "x",
25 => "y",
26 => "z"
);



?>
