<h1>Search e-RA Publications</h1>

<p>The e-RA database contains a comprehensive bibliography of publications related to the Rothamsted Long-term experiments. </p>

<p>Also included are the majority of publications by J.B. Lawes and J.H. Gilbert, from 1842 - 1900. These encompass a wide range of topics, in addition to the Rothamsted long-term experiments, such as the disposal of sewage and the nutrition of farm animals. Not included are many of the letters, comments, reports of meetings etc where Lawes or Gilbert are only mentioned or quoted. For the complete list of Lawes & Gilbert publications, see Dyke (1991) ‘John Bennet Lawes: The Record of his Genius’. </p>

<div id="boxPaper">
	<p>You can search the e-RA publications by any of these fields:</p>
	<form
		action="<?php echo $Web_base;?>index.php"
		method="Get">

		<input
			type="hidden"
			name="area"
			value="home"> <input
			type="hidden"
			name="page"
			value="<?=$page?>">
		<div class="row">
			<span class="infolabel">Search Author:</span> <span class="info"><input
				type="text"
				name="SearchAuthor"
				value="<?=$SearchAuthor?>"
				width="16"> </span>
		</div>
		<div class="row">
			<span class="infolabel">Search Title:</span> <span class="info"> <input
				type="text"
				name="SearchTitle"
				value="<?=$SearchTitle?>"
				size="45"> </span>
		</div>
		<div class="row">
			<span class="infolabel">Search Abstracts:</span> <span class="info"><input
				type="checkbox"
				name="SearchSum"
				<?php if ($SearchSum) {echo " checked ";}?> /> </span>
		</div>
		<div class="row">
			<span class="infolabel">Experiment</span> <span class="info"> <select
				name="expt[]"
				multiple
				size=5>
					<option value="Broadbalk">Broadbalk</option>
					<option value="Park Grass">Park Grass</option>
					<option value="Hoosfield">Hoosfield</option>
					<option value="Alternate Wheat and Fallow">Alternate Wheat and Fallow</option>
					<option value="Exhaustion Land">Exhaustion Land</option>
					<option value="Agdell">Agdell</option>
					<option value="Barnfield">Barnfield</option>
					<option value="Garden Clover">Garden Clover</option>
					<option value="Broadbalk Wilderness">Broadbalk Wilderness</option>
					<option value="Geescroft Wilderness">Geescroft Wilderness</option>
					<option value="Fosters ley arable">Fosters ley arable</option>
					<option value="Highfield ley arable">Highfield ley arable</option>
					<option value="Highfield bare fallow">Highfield bare fallow</option>
					<option value="Saxmundham Rotations">Saxmundham Rotations</option>
					<option value="Woburn">Woburn</option>
					<option value="North Wyke">North Wyke</option>
					<option value="Met data">Met data</option>

			</select> </span>
		</div>
		<div class="row">
			<span class="infolabel">&nbsp;</span> <span class="info">&nbsp;&nbsp;</span>
		</div>
		<div class="row">
			<span class="infolabel">and Years </span> <span class="info"> from <INPUT
				NAME="startyear"
				SIZE=4
				value="<?=$startyear?>"> </span> to <INPUT
				NAME="stopyear"
				SIZE=4
				value="<?=$stopyear?>"> <br /> </span>
		</div>
		<div class="row">
			<span class="infolabel">Display Abstracts:</span> <span class="info"><input
				type="checkbox"
				name="Summary"
				<?php if ($Summary) {echo " checked ";} ?> /> </span>
		</div>
		<div class="row">
			<span class="infolabel">Prepare Output</span> <span class="info"><input
				type="radio"
				name="output"
				value="TAB" />: TAB separated values</span>
		</div>
		<div class="row">
			<span class="infolabel">&nbsp; </span> <span class="info"><input
				type="radio"
				name="output"
				value="ENL" />: or other reference software</span>
		</div>
		<div class="row">
			<span class="infolabel">&nbsp; </span> <span class="info"><input
				type="radio"
				name="output"
				value="NO"
				checked="checked" />: No output </span>
		</div>
		<div class="row">
			<span class="infolabel">&nbsp;</span> <span class="info"> <input
				type="submit"
				name="submit"
				value="Search" /><input
				type="submit"
				name="reset"
				value="Reset" /> </span>
		</div>


	</form>
</div>
<br />
<br />
<br />
				<?php

				if (!$submit) {$submit = "Search";}
				if ($submit == "Search") {
					echo("<hr />");
					echo ("<h3>Results of your search</h3>");

					echo ("Your search settings are: <br />");
					//------------year-----------------

					if ($stopyear == "")  {$stopyear = $startyear;}

					if (($startyear <= $stopyear) and ($startyear >1800)) {
						$stringYear = ("AND ( `Year` BETWEEN $startyear AND $stopyear ) ");
						echo ("Timespan:<b> $startyear - $stopyear </b><br />");

					} else {$stringYear = "";}

					if (isset ($expt))  {
						//-----keywords-------------------
						$stringKeywords = "AND (";

						foreach ($expt as $value)
						{
							echo "keyword <b> $value </b>is SELECTED <br />";
							$stringKeywords = $stringKeywords."`Keywords` LIKE '%$value%'  OR ";
						}

						$L = strlen($stringKeywords) - 3;
						$stringKeywords = substr ($stringKeywords, 0 , $L);
						$stringKeywords = $stringKeywords .")";
					} else {$stringKeywords = "";}
					$stringTitle = "";
					if ($SearchTitle) {
						$stringTitle = "AND (`Title` LIKE '%$SearchTitle%' OR `Keywords` LIKE '%$SearchTitle%' ";
						echo ("With  <b>$SearchTitle  </b>in the title <br />");
						if ($SearchSum) {$stringTitle = $stringTitle. "OR `Comment` LIKE '%$SearchTitle%' ";}
						$stringTitle = $stringTitle. ") ";
					}


					$StringNameSearch = "AND (";
					if ($SearchAuthor) {
						$StringNameSearch .= "`Authors` LIKE '%$SearchAuthor%' AND ";
						echo ("With  <b>$SearchAuthor </b> in the Author's list <br />");
					}
					$StringNameSearch .= "`RefType` IS NOT NULL)";
					//echo       $StringNameSearch;
					$query = "SELECT `eraPapers`.`PaperID`, 
`eraPapers`.`RefType`,
 `eraPapers`.`Authors`, 
IF(`eraPapers`.Year IS NULL or `eraPapers`.Year='', 1, 0)AS yearnull , 
`eraPapers`.`Year` , 
`eraPapers`.`Title`, 
`eraPapers`.`Journal`, 
`eraPapers`.`Volume`, 
`eraPapers`.`Issue`, 
`eraPapers`.`Pages`, 
`eraPapers`.`Keywords`, 
`eraPapers`.`Date`, 
`eraPapers`.`Comment`,
`eraPapers`.`DOI` as `PaperDOI`, 
`eraPapers`.`URL`, 
`eraPapers`.`GRID` as `eRAGRID`,
`RaDOIs`.`DOI` as `eradocDOI` 
FROM `eraPapers` left join `RaDOIs` on `RaDOIs`.`GRID` = `eraPapers`.`GRID` WHERE 1
					$stringYear
					$stringKeywords
					$stringTitle
					$StringNameSearch
			     order by `yearnull` desc, `Year`  Desc";

					$random = rand(234, 123456789);

					if ($output =="TAB")
					{
						outputTAB($query);

						?>
<br />
<b> <a
	href="export.txt?noCache=<?=$random?>"
	target="_BLANK">Download your TAB separated Output</a> </b>
						<?php

					} elseif ($output == "ENL")
					{outputALL($query);
					?>

<b><a
	href="export.txt?noCache=<?=$random?>"
	target="_BLANK">Save to Endnote or other reference software</a> | <a
	href="home/helpenl.php"
	target="out">Help (html) </a> | <a
	href="home/helpenl.pdf"
	target="out">Help (pdf) </a> </b>
					<?php
					}
					else
					{;
					}
					?>

					<?php
					echo $query;
					LogAsGuest();

					$resultk2 = mysql_query($query);
					if (!$resultk2)	{
						print ("query failed");
					} else	{       $i = 0;
					$nbResults = mysql_num_rows (  $resultk2 );
					if ($nbResults >0) {echo ("<br /><b>Result: $nbResults papers</b><br />");}
					while ($rowk2 = mysql_fetch_array ($resultk2))	{

						/*if ( $rowk2[RefType] != $OldType) {
						 echo ("\n</ul>\n");
						 echo ("\n<h4>Reference Type: $rowk2[RefType]</h4>\n");
						 $OldType = $rowk2[RefType];
						 $OldYear = "";
						 }*/
						if ( $rowk2[Year] != $OldYear ) {

							if ($rowk2[yearnull] == "1") {
								echo ("\n<p><b><i>In Preparation</i></b></p>\n<ul>");
								$OldYear = $rowk2[Year];
							} else
							{
								if ($OldYear != "") {
									echo ("\n </ul>\n");
								}
								echo ("\n<p><b><i>$rowk2[Year]</i></b></p>\n<ul>");
								$OldYear = $rowk2[Year];
							}

						}
						$ReferenceLine = "";
						$ReferenceLine = $ReferenceLine . "\n<li class=\"nicelist\"> $rowk2[Authors] ";
						if ($rowk2[Year] ) {
							$ReferenceLine = $ReferenceLine . "($rowk2[Year])";
						}
						if ($rowk2[Title]) {
							$ReferenceLine = $ReferenceLine .  " \"$rowk2[Title]\"";
						}
						if ($rowk2[Journal]) {
							$ReferenceLine = $ReferenceLine .  ", <i>$rowk2[Journal]</i>";
						}
						if ($rowk2[Volume]) {
							$ReferenceLine = $ReferenceLine .  ", <b>$rowk2[Volume]</b>";
						}
						if ($rowk2[Issue]) {
							$ReferenceLine = $ReferenceLine .  ", ($rowk2[Issue])";
						}
						if ($rowk2[Pages]) {
							$ReferenceLine = $ReferenceLine .  ", $rowk2[Pages]";
						}
						$link = 0;
						if (strlen(trim($rowk2[eradocDOI]))>1) {
							$ReferenceLine = $ReferenceLine ."<br /> <b>DOI: <A HREF=\"\" target=\"popup\" onClick=\"NewWindow('$rowk2[eradocDOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">$rowk2[eradocDOI]</a></b>";
							$link = 1;
						} else  
							if (strlen(trim($rowk2[eRAGRID]))>1) {
								$ReferenceLine = $ReferenceLine ."<br /> <b>eRAdocID: <A HREF=\"\" target=\"popup\" onClick=\"NewWindow('eradoc/article/$rowk2[eRAGRID]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">$rowk2[eRAGRID]</a></b>";
						$link = 1;
						} else
						if (strlen(trim($rowk2[PaperDOI]))>1) {
							$ReferenceLine = $ReferenceLine . "<br /> <b>DOI: <A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://dx.doi.org/$rowk2[PaperDOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">$rowk2[PaperDOI]</a></b>";
							$link = 1;
						
						} else  if (strlen(trim($rowk2[URL]))>1 && !strstr(trim($rowk2[URL]), '<') ) {
							
							$link = 1;
							
							$ReferenceLine = $ReferenceLine .  "<br /> <b>URL: <A HREF=\"\" target=\"popup\" onClick=\"NewWindow('$rowk2[URL]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper</a></b>";
						}
						if ($link == 0) {
							$title = urlencode($rowk2[Title]);
							$ReferenceLine = $ReferenceLine .  "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('https://scholar.google.co.uk/scholar?hl=en&q=".$title."', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Search Google Scholar</a></b>";
							
						}
							
								
						if ($rowk2[Comment]) { if ($Summary) {
							$ReferenceLine = $ReferenceLine .  "<br /> <sub>$rowk2[Comment]</sub>"; }
						}

						$ReferenceLine = $ReferenceLine ." ($rowk2[RefType]) </li>";
						echo $ReferenceLine;
						$i++;
					}
					if ($i == 0) {
						echo("<br />No publication was found with these criteria. Please try and widen your search.<br />");
					}

					}

				}
				?>

</ul>


