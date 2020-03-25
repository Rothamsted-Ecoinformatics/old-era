<?php
foreach($_GET as $sk => $sv)
{     
$$sk = $sv;
}
foreach($_POST as $sk => $sv)
{     
$$sk = $sv;
}
require('includes/connect.inc');
require('includes/settings.inc');
require('includes/functions.inc');

if ($submit == "Submit!") {



if ($stopyear == "")  {$stopyear = $startyear;}

if (($startyear <= $stopyear) and ($startyear >1800)) {
$stringYear = ("AND ( `Year` BETWEEN $startyear AND $stopyear ) ");


} else {$stringYear = "";}
//echo $stringYear;
if ($expt)  {
//-----keywords-------------------
 $stringKeywords = "AND (";
foreach ($expt as $value)
{

 $stringKeywords = $stringKeywords."`Keywords` LIKE '%$value%'  OR ";
}
$L = strlen($stringKeywords) - 3;
$stringKeywords = substr ($stringKeywords, 0 , $L);
$stringKeywords = $stringKeywords .")";
} else {$stringKeywords = "";}
$stringTitle = "";
if ($SearchTitle) {
$stringTitle = "AND (`Title` LIKE '%$SearchTitle%' ";

if ($SearchSum) {$stringTitle = $stringTitle. "OR `Comment` LIKE '%$SearchTitle%' ";}
$stringTitle = $stringTitle. ") ";
}


$StringNameSearch = "AND (";
if ($SearchAuthor) {
$StringNameSearch .= "`Authors` LIKE '%$SearchAuthor%' AND ";

}
$StringNameSearch .= "`RefType` IS NOT NULL)";
//echo       $StringNameSearch;
$query = "SELECT *, IF(Year IS NULL or Year='', 1, 0)AS yearnull FROM `eraPapers` WHERE 1
			     $stringYear
       	 	    	     $stringKeywords    
			     $stringTitle
                             $StringNameSearch
			     order by `RefType` asc, `yearnull` desc, `Year`  Desc";


//echo $query; //Change that with Listing Unreviewed poster in a separate category.
LogAsGuest();

$resultk2 = mysql_query($query);
if (!$resultk2)	{
	print ("query failed");
} else	{       $i = 0;
                $nbResults = mysql_num_rows (  $resultk2 );
                if ($nbResults >0) {echo ("<br /><b>Result: $nbResults papers</b><br />");}
		while ($rowk2 = mysql_fetch_array ($resultk2))	{


		$ReferenceLine = "%0";
                $ReferenceLine = $ReferenceLine . "\n<li class=\"nicelist\"> $rowk2[Authors] ";
                if ( $rowk2[Year] ) {
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
                if ($rowk2[Pages]) {
                                   	$ReferenceLine = $ReferenceLine .  ", $rowk2[Pages]";
                }
                  if ($rowk2[Comment]) { if ($Summary) {
                                   	$ReferenceLine = $ReferenceLine .  "<br /> <sub>$rowk2[Comment]</sub>"; }
                }
                $ReferenceLine = $ReferenceLine ."</li>";
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


