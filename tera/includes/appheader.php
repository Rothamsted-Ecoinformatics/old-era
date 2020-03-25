<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>eRA: <?php echo($areatitle.": ".$pagetitles[$page]);?></title>
<link rel=stylesheet href="includes/appheader.css" type="text/css" />
<link rel=stylesheet href="includes/print.css" type="text/css" media="print" />
<script language="Javascript" src="includes/javascript_functions.js" type="text/javascript"></script>
</head>
<body>
<div id="logo">
     <a href="<?=$Web_base?>"><img border="0" align="top"
			    src="includes/e-RAlogoTiny.jpg"
			    alt="eRA Logo - Back to home page"
			    hspace="0" vspace="0"
			    width = "56"
			    height = "40" /></a>
</div>
<div id="title"><a href="<?=$Web_base?>">eRA</a>: Data Extraction Tool</div>
<div id="topline">
<ul id="globalnav">
		<li><a href="index.php">Home</a> </li>
		<li><a href="index.php?area=help&page=contact">Contact</a> </li>
		<?php
		if ($name == "Guest") {
		?>
		<li><a href="index.php?area=home&page=login" target="era">Login</a> </li>
		<?php
		} else {
 		echo("<li><a href=\"\">$name</a></li");
 	}
	?>

</ul>
</div>
<!-----------------------------------------End of header------------------------------------------------->
