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

  #remove the directory path we don't want



include ('includes/connect.php'); 		//Connect to database
include ('includes/user.php');  		//includes code to check user. At the end of that, user is logged in and username and name is set...
include ('includes/settings.php'); 		//includes settings for page or area
include ('metadata/metasettings.php');
include ('includes/functions.php'); 		//includes functions to write different html snippets from variable
include ('includes/header.php'); 		//includes header for area
include ('includes/bioweb.class.php'); 		//Most functions could be encapsulated in class...

?>



<div id="widebody">

      	<?php
		if ($dataset == 7) {
			include('home/nwmap.php');
		}
      	else 
      	{
      		include('home/slidemap.php');
      	}
      	

      					if (!$page == 0) 	{
						if ($page != "news") {
?>
								
<div id="tweetbox"> <a href="https://twitter.com/share" class="twitter-share-button"  data-text="I found this on the eRA web site:" data-via="eRA_curator">Tweet</a></p>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

		<? }
						
      						include($area.'/'.$page.'.php');
      					} else {
      						include($area.'/index.php');
      					}
					//echo ($KeyRef);
      					if ($KeyRef) {
          	                        GetKeyRefs ($KeyRef);
      					}
      	?>
<?php 
//TestVar();
?>
</div>

<?php
include('includes/footer.php'); //includes header for area
?> 

