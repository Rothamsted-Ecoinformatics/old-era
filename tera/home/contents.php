<li class="simplelist"><a href="">Home</a></li>
<li class="simplelist"><a href="News">News</a></li>
<br />
<li class="simplelist"><a href="<?=$det?>" target="det">Extract Data</a></li>
<br />
<li class="simplelist"><a href="open_access">Open Access</a></li>
<br />
<?php
LogAsGuest();
//$UserID = GetWhat ("eraUsers", "Username", "UserID", $name);
//$UserType = GetWhat ("eraUsers", "Username", "UserMembershipTypeID", $name);
$seekContent = "SELECT eraDatasets.ShortName as `displaynone`, `eraDatasetName`
FROM `eraDatasets` 
Where infoLevel <4
order by `TabOrder`";
//echo $seekContent;
/*InfoLevel: 1: all, 2: all 3: pink and green 4: not in TOC of Datasets 
*/

$table1 = new Query;
$table1->sql = $seekContent;
$table1->next = '';
$table1->nextID = 'displaynone';
$table1->anchor = 'eraDatasetName';
$table1->display = 'toc';
$table1->listclass = 'simplelist';
$table1->displayResults();
?>
<li class="simplelist"><a href="http://www.rothamsted.ac.uk/farmplatform">North Wyke Farm Platform</a></li>
<br />
<li class="simplelist"><a href="studies">Case studies</a></li>
<li class="simplelist"><a href="Met/schools">Schools and Public</a></li>
<br />



<li class="simplelist"><a target="roth" href="http://www.rothamsted.ac.uk/sample-archive">
Sample Archive</a></li>
<li class="simplelist"><a target="roth" href="http://www.rothamsted.ac.uk/insect-survey/"> Insect Survey</a></li>
<li class="simplelist"><a href="http://www.rothamsted.ac.uk/farmplatform">North Wyke Farm Platform</a></li>

<br />
<br />

<li class="simplelist"><a href="papers">
Search Bibliography</a></li>
<li class="simplelist"><a href="http://www.era.rothamsted.ac.uk/eradoc/collections.php">
eRAdoc</a></li>
<li class="simplelist" id="sideBarTab2"><a href="map">
Soil Map</a></li>
<br />
<br />
<li class="simplelist"><a href="disclaimer">Disclaimer</a></li>
<li class="simplelist"><a href="dataq">Data Quality</a></li>
<li class="simplelist"><a href="contact">Credits and Contact</a></li>
<br />
<br />
<li class="simplelist"><a href="links">Links</a></li>
<br />
<br />
<li class="simplelist"><a href="index.php?area=help">Help</a></li>
