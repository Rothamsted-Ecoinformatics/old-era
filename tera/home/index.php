
<?php
LogAsGuest();
if (!$dataset) {

require ("home/top_index.php");
/*
$seekContent = "SELECT eraDatasets.eraDatasetID as `displaynone`, `eraDatasetName`
FROM `eraUserDatasets` , `eraDatasets` 
WHERE eraDatasets.eraDatasetID = eraUserDatasets.eraDatasetID
AND eraUserDatasets.UserID =$UserID
AND eraDatasets.infoLevel <=$UserType
order by `TabOrder`";

//echo $seekContent;

$table1 = new Query;
$table1->sql = $seekContent;
$table1->next = 'index.php?area=home&page=index&amp;dataset=';
$table1->nextID = 'displaynone';
$table1->anchor = 'eraDatasetName';
$table1->display = 'toc';
$table1->listclass = 'list';
$table1->displayResults();

*/

}
else
{
 LogAsGuest();
//$UserType = GetWhat ("eraUsers", "Username", "UserMembershipTypeID", $name);
//$infoLevel = GetWhat ("eraDatasets", "eraDatasetID", "infoLevel", $dataset);
//echo $UserType;
//echo "<br>";
//echo $infoLevel;
$metadata =  GetWhat ("eraDatasets", "eraDatasetID", "eraMetadatalocation", $dataset);
if(!$sub) 
{
	$file = $metadata."index.php";
} 
else
{		
$check = glob($metadata .$sub, GLOB_ONLYDIR);

	if ($check) {
		$metadata =  $metadata.$sub.'/';
		$file = $metadata."/index.php";
		}
	else {
		$folder = $metadata;
		$file= $metadata.$sub.".php";
	}
}

include ($file);
}
?>

