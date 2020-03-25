<h1>This is a heading</h1>
<p>Normal text (p tag)</p>
<h2>This is a H2</h2>
<table class="borderarea" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td>
    <table class="resulttable" cellpadding="3" cellspacing="2"  width="100%">
    <thead>
	<tr  class="tablepageheader">
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    </tr>
    </thead>
    <tfoot>
	<tr  class="tablepageheader">
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    	<th align="center">Heading 1</th>
    </tr>
    </tfoot>
        <tbody>
    <?php
    /* 
    //this code loops through the database and fills in rows of alternate colors uncomment the area and write your own SQL to use that
 	  $sqlAssays = "SELECT * FROM `AssaysDescription`, `Projects`, `Strains` WHERE AssaysDescription.UserID= $LoggedUserID and Projects.ProjectID = AssaysDescription.ProjectID and Strains.StrainID = AssaysDescription.StrainID  and AssaysDescription.isFinished = 0 ORDER BY AssaysDescription.AssayID";
	  $resultAssays = mysql_query($sqlAssays);
	  $num_rowsAssays = mysql_num_rows($resultAssays);
	  while ($rowAssays = mysql_fetch_array ($resultAssays))	{
        if ($RowStyle == "roweven")	{
           $RowStyle = "rowodd";
        } else	{
          $RowStyle = "roweven";
        }
        echo ("<tr class=\"$RowStyle\">");
        echo ("<td><a href=\"bdbd.php?area=mybd&page=myexpts&expt=$rowAssays[AssayID]\">$rowAssays[AssayID]</a></td>");
        echo ("<td>$rowAssays[AssayApplicationDate]</td>") ;
        echo ("<td>$rowAssays[StrainName]</td>") ;
        echo ("<td>");
  	  $sqlDrugs = "SELECT DISTINCT Compounds.CompoundID, Compounds.CompoundName FROM `AssaysPotNames`, `PotsCompoundDilutions`, `CompoundDilutions`, `Compounds` WHERE AssaysPotNames.AssayID= $rowAssays[AssayID] and PotsCompoundDilutions.PotID=AssaysPotNames.PotID 	and CompoundDilutions.CompoundDilutionID=PotsCompoundDilutions.CompoundDilutionID and Compounds.CompoundID = CompoundDilutions.CompoundID";
  	  $resultDrugs = mysql_query($sqlDrugs);
	  $num_rowsDrugs = mysql_num_rows($resultDrugs);
	  $nbDrugs = $num_rowsDrugs;
	  while ($rowDrugs = mysql_fetch_array ($resultDrugs))	{
      echo ( "$rowDrugs[CompoundName]; ");
      }
        echo ("</td>");
        echo ("<td>$rowAssays[ProjectName]</td>") ;
        echo ("</tr>");
		}
       */
       ?>
	     <tr class="roweven">
		 <td>Row with the color of roweven</td>
        <td>Value</td>
        <td>Value</td>
        <td>Value</td>
        </tr>
	     <tr class="rowodd">
		 <td>Row with the color of rowodd</td>
        <td>Value</td>
        <td>Value</td>
        <td>Value</td>
        </tr>
    
    </tbody>
    </table>
    </td>
    </tr>
    </table>




<h3>This is a H3</h3>
<h4>This is a H4</h4>
<h5>This is a H5</h5>
<h6>This is a H6</h6>


