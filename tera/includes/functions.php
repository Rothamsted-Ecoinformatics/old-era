<?php

function outputTAB($query) { // prepare a file called export.txt in index directory to export Library as TAB
	LogAsGuest ();
	
	$resultk2 = mysql_query ( $query );
	if (! $resultk2) {
		print ("query failed") ;
	} else {
		$ourFileName = "export.txt";
		$fh = fopen ( $ourFileName, 'w' ) or die ( "can't open file" );
		$ReferenceLine = "Reference Type\tAuthor\tYear\tTitle\tSecondary Title\tVolume\tPages";
		fwrite ( $fh, $ReferenceLine );
		// echo ("<pre>");
		$i = 0;
		// echo ("Reference Type\tAuthor\tYear\tTitle\tSecondary Title\tVolume\tPages");
		while ( $rowk2 = mysql_fetch_array ( $resultk2 ) ) {
			
			$ReferenceLine = "\n$rowk2[RefType]";
			$stringAuthors = str_replace ( ". and", ";", $rowk2 [Authors] );
			$stringAuthors2 = str_replace ( ". ,", ";", $stringAuthors );
			$ReferenceLine = $ReferenceLine . "\t $stringAuthors2";
			$ReferenceLine = $ReferenceLine . "\t $rowk2[Year]";
			$ReferenceLine = $ReferenceLine . "\t $rowk2[Title]";
			$ReferenceLine = $ReferenceLine . "\t $rowk2[Journal]";
			$ReferenceLine = $ReferenceLine . "\t $rowk2[Volume]";
			$ReferenceLine = $ReferenceLine . "\t $rowk2[Pages]";
			$ReferenceLine = $ReferenceLine . "\t $rowk2[DOI]";
			// $ReferenceLine = $ReferenceLine . "\t $rowk2[Comment]";
			// echo $ReferenceLine;
			fwrite ( $fh, $ReferenceLine );
		}
	}
	
	fclose ( $fh );
}
function pretty($var) {
	echo ("<br />");
	echo ("<table class=\"withBorder\" >");
	if (is_array ( $var )) {
		foreach ( $var as $key => $values ) {
			if (is_array ( $values )) {
				foreach ( $values as $key2 => $value ) {
					echo ("<tr><td><b>" . $key2 . "</b></td><td>" . $value . "</td></tr>");
					;
				}
			} else {
				echo ("<tr><td><b>" . $key . "</b></td><td>" . $values . "</td></tr>");
			}
		}
	}
	
	echo "</table>";
	if (is_string ( $var )) {
		echo ($var);
	}
	echo ("<br />");
	return;
}
function outputEN($query) {
	LogAsGuest ();
	
	$resultk2 = mysql_query ( $query );
	if (! $resultk2) {
		print ("query failed") ;
	} else {
		$ourFileName = "export.txt";
		$fh = fopen ( $ourFileName, 'w' ) or die ( "can't open file" );
		
		// echo ("<pre>");
		$i = 0;
		
		while ( $rowk2 = mysql_fetch_array ( $resultk2 ) ) {
			
			$ReferenceLine = "\n\n%0 $rowk2[RefType]";
			$stringAuthors = str_replace ( ". and", "\n%A", $rowk2 [Authors] );
			$stringAuthors2 = str_replace ( ". ,", "\n%A", $stringAuthors );
			$ReferenceLine = $ReferenceLine . "\n%A $stringAuthors2";
			if ($rowk2 [Year]) {
				$ReferenceLine = $ReferenceLine . "\n%D $rowk2[Year]";
			}
			if ($rowk2 [Title]) {
				$ReferenceLine = $ReferenceLine . "\n%T $rowk2[Title]";
			}
			if ($rowk2 [Journal]) {
				$ReferenceLine = $ReferenceLine . "\n%J $rowk2[Journal]";
			}
			if ($rowk2 [Volume]) {
				$ReferenceLine = $ReferenceLine . "\n%V $rowk2[Volume]";
			}
			if ($rowk2 [Pages]) {
				$ReferenceLine = $ReferenceLine . "\n%P $rowk2[Pages]";
			}
			if ($rowk2 [Comment]) {
				if ($Summary) {
					$ReferenceLine = $ReferenceLine . "\n%X $rowk2[Comment]";
				}
			}
			// echo $ReferenceLine;
			fwrite ( $fh, $ReferenceLine );
		}
	}
	
	fclose ( $fh );
}
function outputMED($query) {
	LogAsGuest ();
	
	$resultk2 = mysql_query ( $query );
	if (! $resultk2) {
		print ("query failed") ;
	} else {
		$ourFileName = "export.txt";
		$fh = fopen ( $ourFileName, 'w' ) or die ( "can't open file" );
		
		// echo ("<pre>");
		$i = 0;
		
		while ( $rowk2 = mysql_fetch_array ( $resultk2 ) ) {
			
			$ReferenceLine = "\n\nPMID- $rowk2[PaperID]\nPT  - $rowk2[RefType]";
			$stringAuthors = str_replace ( ". and", "\nAU", $rowk2 [Authors] );
			$stringAuthors2 = str_replace ( ". ,", "\nAU", $stringAuthors );
			$stringAuthors3 = str_replace ( ".", "", $stringAuthors2 );
			$stringAuthors4 = str_replace ( " ", "", $stringAuthors3 );
			$stringAuthors5 = str_replace ( ",", " ", $stringAuthors4 );
			$stringAuthors6 = str_replace ( "AU", "AU  - ", $stringAuthors5 );
			$ReferenceLine = $ReferenceLine . "\nAU  - $stringAuthors6";
			if ($rowk2 [Year]) {
				$ReferenceLine = $ReferenceLine . "\nDP  - $rowk2[Year]";
			}
			if ($rowk2 [Title]) {
				$ReferenceLine = $ReferenceLine . "\nTI  - $rowk2[Title]";
			}
			if ($rowk2 [Journal]) {
				$ReferenceLine = $ReferenceLine . "\nJT  - $rowk2[Journal]";
			}
			if ($rowk2 [Journal]) {
				$ReferenceLine = $ReferenceLine . "\nTA  - $rowk2[Journal]";
			}
			if ($rowk2 [Volume]) {
				$ReferenceLine = $ReferenceLine . "\nVI  - $rowk2[Volume]";
			}
			if ($rowk2 [Issue]) {
				$ReferenceLine = $ReferenceLine . "\nIP  - $rowk2[Issue]";
			}
			if ($rowk2 [Pages]) {
				$ReferenceLine = $ReferenceLine . "\nPG  - $rowk2[Pages]";
			}
			
			if ($rowk2 [Comment]) {
				$ReferenceLine = $ReferenceLine . "\nAB  - $rowk2[Comment]";
			}
			// echo $ReferenceLine;
			fwrite ( $fh, $ReferenceLine );
		}
	}
	
	fclose ( $fh );
}
function outputALL($query) {
	LogAsGuest ();
	
	$ReferenceLine = "FN ISI Export Format";
	$results = mysql_query ( $query );
	if (! $results) {
		print ("query failed") ;
	} else {
		$ourFileName = "export.txt";
		$fh = fopen ( $ourFileName, 'w' ) or die ( "can't open file" );
		fwrite ( $fh, $ReferenceLine );
		while ( $rows = mysql_fetch_array ( $results ) ) {
			
			$RefType = $rows [RefType];
			$PT = $RefType {0};
			$ReferenceLine = "\nPT $PT";
			$stringAuthors = str_replace ( ". and", "\n  ", $rows [Authors] );
			$stringAuthors2 = str_replace ( ". ,", "\n  ", $stringAuthors );
			$stringAuthors3 = str_replace ( ". ", "", $stringAuthors2 );
			$stringAuthors4 = str_replace ( ".", "", $stringAuthors3 );
			$ReferenceLine = $ReferenceLine . "\nAU $stringAuthors4";
			
			if ($rows [Year]) {
				$ReferenceLine = $ReferenceLine . "\nPY $rows[Year]";
			}
			if ($rows [Title]) {
				$ReferenceLine = $ReferenceLine . "\nTI $rows[Title]";
			}
			if ($rows [Journal]) {
				$ReferenceLine = $ReferenceLine . "\nSO $rows[Journal]";
			}
			
			if ($rows [Volume]) {
				$ReferenceLine = $ReferenceLine . "\nVL $rows[Volume]";
			}
			if ($rows [Issue]) {
				$ReferenceLine = $ReferenceLine . "\nIS $rows[Issue]";
			}
			if ($rows [Pages]) {
				$ReferenceLine = $ReferenceLine . "\nPG $rows[Pages]";
			}
			if ($rows [PaperDOI]) {
				$ReferenceLine = $ReferenceLine . "\nDI $rows[PaperDOI]";
			}
			fwrite ( $fh, $ReferenceLine );
			if ($rows [Comment]) {
				fwrite ( $fh, "\nAB $rows[Comment]" );
			}
			fwrite ( $fh, "\nER\n" );
		}
		fwrite ( $fh, "\nEF" );
	}
	
	fclose ( $fh );
}
function GetBreadCrumbs() {
	foreach ( $_GET as $sk => $sv ) {
		$$sk = $sv;
	}
	global $areatitle, $pagetitles;
	
	echo ("<a href=\"index.php?area=$area\">$areatitle</a>");
	
	if ($previous) {
		
		if (! $pagetitles [$previous]) {
			$pagetitles [$previous] = $previous; // makes sure the title is not empty
		}
		echo ("> <a href=\"index.php?area=$area&amp;page=$previous\">$pagetitles[$previous]</a>");
	}
	if ($page) {
		
		if (! $pagetitles [$page]) {
			$pagetitles [$page] = $page; // makes sure the title is not empty
		}
		echo ("> $pagetitles[$page]");
	}
	return $result;
}
function ToggleStyle() {
	$newstring = "";
	parse_str ( $_SERVER ['QUERY_STRING'], $querystring );
	foreach ( $querystring as $name => $value ) {
		if (($name) != "style") {
			$newstring = $newstring . "&amp;" . $name . "=" . $value;
		}
	}
	if ($querystring [style] == "index" or ! $querystring [style]) {
		$newstring = $newstring . "&amp;style=wide\">Hide TOC</a>";
	} else {
		$newstring = $newstring . "&amp;style=index\">Show TOC</a>";
	}
	echo ("<a href=\"index.php?$newstring");
}
function GetWhat($Table, $SearchWhat, $ReturnWhat, $EqualWhat) // Get a single
{
	LogAsGuest ();
	$Label = "0";
	if (! $EqualWhat) {
		$Label = "None";
		if ($Table == "Boxes") {
			$Label = "Autoclave";
		}
	} elseif ($EqualWhat == "none") {
		$Label = "None";
		$isFinished = "False";
	} else {
		// function to get the
		$sql = "Select * from `$Table` where `$SearchWhat` = '$EqualWhat'";
		
		$result = mysql_query ( $sql );
		$num_rows = mysql_num_rows ( $result );
		if (! $result) {
			print ("query failed") ;
		} else {
			if ($num_rows > 0) {
				while ( $row = mysql_fetch_array ( $result ) ) {
					$Label = $row [$ReturnWhat];
				}
			}
			mysql_free_result ( $result );
		}
	}
	
	return $Label;
}
function GetList($Table, $Index, $Label, $ID) {
	$LabelName = GetWhat ( $Table, $Index, $Label, $ID );
	
	$sqlk2 = "SELECT * FROM `$Table` WHERE `$Index`= $ID ORDER BY `$Label`;";
	$resultk2 = mysql_query ( $sqlk2 );
	if (! $resultk2) {
		print ("query failed") ;
	} else {
		while ( $rowk2 = mysql_fetch_array ( $resultk2 ) ) {
			echo ("- $rowk2[$Label]<br />");
		}
	}
	return $LabelName;
}
function ListBox($Table, $Index, $Label, $ID) {
	$LabelName = GetWhat ( $Table, $Index, $Label, $ID );
	echo ("<select name=\"$Index\" default=\"$ID\">");
	echo ("<option value=\"$ID\">$LabelName");
	echo ("<option value=\"$ID\">");
	echo ("-----------------------------");
	
	$sqlk2 = "SELECT * FROM `$Table` ORDER BY `$Label`;";
	$resultk2 = mysql_query ( $sqlk2 );
	if (! $resultk2) {
		print ("query failed") ;
	} else {
		while ( $rowk2 = mysql_fetch_array ( $resultk2 ) ) {
			echo ("<option value=\"$rowk2[$Index]\">$rowk2[$Label]");
		}
	}
	
	echo (" </select>");
	return $LabelName;
}
function GetKeyRefs($KeyRef) {
	$query = "SELECT *, IF(Year IS NULL or Year='', 1, 0)AS yearnull FROM `eraPapers` WHERE 1
			  AND `Keywords` Like '%$KeyRef%'
			     order by `yearnull` desc, `Year`  Desc";
	
	// echo $query; //Change that with Listing Unreviewed poster in a separate category.
	LogAsGuest ();
	
	$resultk2 = mysql_query ( $query );
	$num_rowsk2 = mysql_num_rows ( $resultk2 );
	
	if (! $resultk2) {
		print ("query failed") ;
	} else {
		if ($num_rowsk2 > 0) {
			
			?>
<a name="papers"></a>
<h2>Key References</h2>
<?php
			
			$i = 0;
			while ( $rowk2 = mysql_fetch_array ( $resultk2 ) ) {
				
				if ($rowk2 [Year] != $OldYear) {
					
					if ($rowk2 [yearnull] == "1") {
						echo ("\n</p> <p><b><i>In Preparation</i></b></p>\n<ul>");
						$OldYear = $rowk2 [Year];
					} else {
						if ($OldYear != "") {
							echo ("\n </ul>\n");
						}
						echo ("\n</p> <p><b><i>$rowk2[Year]</i></b></p>\n<ul>");
						$OldYear = $rowk2 [Year];
					}
				}
				$ReferenceLine = "";
				$ReferenceLine = $ReferenceLine . "\n<li class=\"nicelist\"> $rowk2[Authors] ";
				if ($rowk2 [Year]) {
					$ReferenceLine = $ReferenceLine . "($rowk2[Year])";
				}
				if ($rowk2 [Title]) {
					$ReferenceLine = $ReferenceLine . " \"$rowk2[Title]\"";
				}
				if ($rowk2 [Journal]) {
					$ReferenceLine = $ReferenceLine . ", <i>$rowk2[Journal]</i>";
				}
				if ($rowk2 [Volume]) {
					$ReferenceLine = $ReferenceLine . ", <b>$rowk2[Volume]</b>";
				}
				if ($rowk2 [Pages]) {
					$ReferenceLine = $ReferenceLine . ", $rowk2[Pages]";
				}
				if ($rowk2 [GRID]) {
					$ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://www.era.rothamsted.ac.uk/eradoc/article/$rowk2[GRID]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper from eRAdoc</a></b>";
				}
				
				if ($rowk2 [DOI]) {
					$ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://dx.doi.org/$rowk2[DOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper</a></b>";
				} elseif ($rowk2 [URL]) {
					if (substr_count ( $rowk2 [URL], "<GO" ) > 0) {
						;
					} else {
						$ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://dx.doi.org/$rowk2[DOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper</a></b>";
					}
				} else {
				}
				
				$ReferenceLine = $ReferenceLine . "</li>";
				echo $ReferenceLine;
				$i ++;
			}
			if ($i == 0) {
				echo ("No publication was found with these criteria. Please try and widen your search.");
			}
		}
	}
}
function GetKeyRefs2($KeyRef) {
	$query = "SELECT *, IF(Year IS NULL or Year='', 1, 0)AS yearnull FROM `eraPapers` WHERE 1
			  AND `Keywords` Like '%$KeyRef%'
			     order by `yearnull` desc, `Year`  Desc";
	
	// echo $query; //Change that with Listing Unreviewed poster in a separate category.
	LogAsGuest ();
	
	$resultk2 = mysql_query ( $query );
	$num_rowsk2 = mysql_num_rows ( $resultk2 );
	
	if (! $resultk2) {
		print ("query failed") ;
	} else {
		if ($num_rowsk2 > 0) {
			
			$i = 0;
			while ( $rowk2 = mysql_fetch_array ( $resultk2 ) ) {
				
				if ($rowk2 [Year] != $OldYear) {
					
					if ($rowk2 [yearnull] == "1") {
						echo ("\n</p> <p><b><i>In Preparation</i></b></p>\n<ul>");
						$OldYear = $rowk2 [Year];
					} else {
						if ($OldYear != "") {
							echo ("\n </ul>\n");
						}
						echo ("\n</p> <p><b><i>$rowk2[Year]</i></b></p>\n<ul>");
						$OldYear = $rowk2 [Year];
					}
				}
				$ReferenceLine = "";
				$ReferenceLine = $ReferenceLine . "\n<li class=\"nicelist\"> $rowk2[Authors] ";
				if ($rowk2 [Year]) {
					$ReferenceLine = $ReferenceLine . "($rowk2[Year])";
				}
				if ($rowk2 [Title]) {
					$ReferenceLine = $ReferenceLine . " \"$rowk2[Title]\"";
				}
				if ($rowk2 [Journal]) {
					$ReferenceLine = $ReferenceLine . ", <i>$rowk2[Journal]</i>";
				}
				if ($rowk2 [Volume]) {
					$ReferenceLine = $ReferenceLine . ", <b>$rowk2[Volume]</b>";
				}
				if ($rowk2 [Pages]) {
					$ReferenceLine = $ReferenceLine . ", $rowk2[Pages]";
				}
				if ($rowk2 [GRID]) {
					$ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://www.era.rothamsted.ac.uk/eradoc/article/$rowk2[GRID]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper from eRAdoc</a></b>";
				}
				
				if ($rowk2 [DOI]) {
					$ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://dx.doi.org/$rowk2[DOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper</a></b>";
				} elseif ($rowk2 [URL]) {
					if (substr_count ( $rowk2 [URL], "<GO" ) > 0) {
						;
					} else {
						$ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://dx.doi.org/$rowk2[DOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper</a></b>";
					}
				} else {
				}
				
				$ReferenceLine = $ReferenceLine . "</li>";
				echo $ReferenceLine;
				$i ++;
			}
			if ($i == 0) {
				echo ("No publication was found with these criteria. Please try and widen your search.");
			}
			echo ("\n </ul>\n");
		}
	}
}

$PageTitle = "";

if ($pagetitles [$page] == "") {
	$pagetitles [$page] = $page; // makes sure the title is not empty
}
$PageTitle .= " " . $pagetitles [$page];

if ($dataset > 0) {
	$PageTitle = GetWhat ( "eraDatasets", "eraDatasetID", "eraDatasetName", $dataset );
}
if ($sub) {
	if ($subs [$sub]) {
		$PageTitle .= " - " . $subs [$sub];
	} else {
		$PageTitle .= " - " . $sub;
	}
}


function TestVar() {
	echo ("<h2>POST variables</h2>");
	foreach ( $_POST as $key => $value ) {
		echo ("$key = $value <br />");
	}
	echo ("<h2>GET variables</h2>");
	foreach ( $_GET as $key => $value ) {
		echo ("$key = $value <br />");
	}
	echo ("<h2>SESSION variables</h2>");
	foreach ( $_SESSION as $key => $value ) {
		echo ("$key = $value <br />");
	}
}

?>
