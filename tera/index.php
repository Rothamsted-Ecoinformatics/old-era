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
#$request  = str_replace("/envato/pretty/php/", "", $_SERVER['REQUEST_URI']);

#split the path by '/'
$params     = explode("/", $request);


include ('includes/connect.php'); 		//Connect to database
include ('includes/settings.php'); 		//includes settings for page or area
include ('metadata/metasettings.php');  //Applies titles to the Sub pages
include ('includes/functions.php'); 		//includes functions to write different html snippets from variable
include ('includes/header.php'); 		//includes header for area
include ('includes/bioweb.class.php'); 		//Most functions could be encapsulated in class...

?>
<div class="row">

	<div class="col-2 navlist ">
		<ul>
		<?php
		if ($area)
		{
			include($area.'/contents.php');
		}
		else {
			include('home/contents.php');
		}
		?>
		</ul>
	</div>
	<?php  if ($page == 'map') {
		?>
	<div class="col-10 mainbody">
	<?php
	} else {?>
		<div class="col-8 mainbody">

		<?php
	}
	if (!$page == 0) 	{
		?>
		<div class="row">
		<div class="col-3">
			
			</div>
		
			<div class="col-8"></div>
			<div class="col-1 mainbody">
			<?php 
		if ($page != "news") {
			?>


			<a
				href="https://twitter.com/share"
				class="twitter-share-button"
				data-text="I found this on the eRA web site:"
				data-via="eRA_curator">Tweet</a>
			</p>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


			<? }
			?>
			</div>
			
			</div><?php 
			if (is_file($area.'/'.$page.'.php')) {
				include($area.'/'.$page.'.php');}
				else {
					include($area.'/index.php');
				}
				
			
	}
				//echo ($KeyRef);
				?>

		</div>
	</div>


	<!-- -----------------------  footer -->
</div>
<div class="row">
	<div class="col-2"></div>
	<div class="col-8 mainbody">
		<a href="http://www.rothamsted.ac.uk/"> <img
			border="0"
			align="top"
			src="includes/RRESCapture.JPG"
			alt="RRes Logo - Back to RRes"
			hspace="0"
			vspace="0"
			width="100%" /> </a>

	</div>
	<div class="col-2"></div>
</div>

				<?php
				//mysql_close($link); //close database connection

	?>




