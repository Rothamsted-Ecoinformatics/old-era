<?php
/*
This file is usually the default file of the web site. It is the one that is mostly use. 
This template has "areas" and "pages".
One change area by clicking on button in horizontal tabed buttons. 
Pages are accessed by links on the left hand table of content or by links in the pages... 
THe variable $area refers to the name of the corresponding folder that contains all the
pages in that area.
If you only have one area, just use home.
Do not delete the includes folder

*/

foreach($_GET as $sk => $sv)
{     
$$sk = $sv;
}
foreach($_POST as $sk => $sv)
{
$$sk = $sv;
}


//require_once('includes/connect.inc'); 		//Connect to database
require_once('includes/user.inc');  		//includes code to check user. At the end of that, user is logged in and username and name is set...
require_once('includes/settings.inc'); 		//includes settings for page or area
require_once('includes/functions.inc'); 		//includes functions to write different html snippets from variable
require_once('includes/appheader.inc'); 		//includes header for area
include ('includes/bioweb.class.inc'); 		//Most functions could be encapsulated in class...

?>
<div id="mainbody">
<p>Here sits Bill's Tool</p>
</div>

<?php


require_once('includes/footer.inc'); //includes header for area

?> 

