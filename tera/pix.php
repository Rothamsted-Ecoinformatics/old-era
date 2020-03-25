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

  <img src="<?=$image?>" />  

*/

foreach($_GET as $sk => $sv)
{
	// stop injection
	// convert with htmlentities($userInput);

           if (is_string($sv)){
              $ftpPos = strpos(strtolower($sv),'ftp:');
	      if ($ftpPos === false)
	      {
		
		 $$sk = htmlentities($sv);

		 } else
	{
		//echo("<p>ftp found in parameter</p>");
		$_GET[$sk] = "";
		$area = "home";
		$page = "index";
	}
         }
         elseif (is_array($sv)) {

		foreach ($sv  as $key => $value) {
			$$sk[$key] = htmlentities($value);

			}




	} else
	{

		$_GET[$sk] = "";
		$area = "home";
		$page = "index";
	}
	// end stop injection
	
}
foreach($_POST as $sk => $sv)
{
	// stop injection
	// convert with htmlentities($userInput);

           if (is_string($sv)){
              $ftpPos = strpos(strtolower($sv),'ftp:');
	      if ($ftpPos === false)
	      {
		
		 $$sk = htmlentities($sv);
		 //echo($sk . " : " . $$sk);
		 } 
         }
		elseif (is_array($sv)) {


		foreach ($sv  as $key => $value) {
			$$sk[$key] = htmlentities ($value);
			}

		


	}
	// end stop injection
	else
	{  
		//echo("<p>ftp found in parameter</p>");
		$_GET[$sk] = "";
		$area = "home";
		$page = "index";
	}
}


include ('includes/connect.php'); 		//Connect to database
//include('includes/user.php');  		//includes code to check user. At the end of that, user is logged in and username and name is set...
include('includes/settings.php'); 		//includes settings for page or area
include('includes/functions.php'); 		//includes functions to write different html snippets from variable
include('includes/pixheader.php'); 		//includes header for area
include ('includes/bioweb.class.php'); 		//Most functions could be encapsulated in class...

?>

<div id="mainbody">
<?php

$thumb_w = 750;

?>

  
      	<img src="<?php echo $image;?>"   width="<?=$thumb_w?>"/>


</div>
<div id="copyrightnotice">
If you wish to use this image, please contact the  
<a href="<?php echo $Era_Curator[Email];?>">e-RA curators</a> 
</div>

<?php


include('includes/footer.php'); //includes header for area

?>

