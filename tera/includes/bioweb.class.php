<?
class Query {
/***********************************************************************************
this is my first class: a way to display query results in a few manners. 
example: in another page id  you have; $sql = "SELECT PeopleID as 'index', fname as 'First Name', lname as 'Last Name', Acronyme as 'Division' from `People`, `Divisions` Where Divisions.DivisionID = People.DivisionID order by lname";

$table1 = new Query;
$table1->sql = $sql;
$table1->next = 'index.php?area=projects&amp;page=people&amp;people=';
$table1->nextID = 'index';
$table1->anchor = 'Last Name';
$table1->display = 'table';
$table1->displayResults();

that will display a table with all the results and the last names will be linked to the personal page abotu that persom

*/
    var $sql;  //that is the actual query
    var $display; //how do we display it?
    var $next; // what is the page called from that link
    var $anchor; // the field used as an anchor
    var $nextID; // the index field used as the next page id...
    var $listclass;

function displayResults () {

if ($this->display == 'table') {
$this->makeTable();
}

if ($this->display == 'list') {
$this->makeList();
}

if ($this->display == 'info') {
$this->makeInfo();
}

if ($this->display == 'toc') {
$this->makeToc();
}
}

function makeTable() {
//$query  =  "select  field1,  fieldn  from  table  [where  clause][group  by  clause][order  by  clause][limit  clause]";

$result = mysql_query($this->sql);
if  (($result)||(mysql_errno  ==  0))
{ 
   echo ("<p>\n<table class=\"borderarea\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n <td>\n");
   echo ("<table class=\"resulttable\" cellpadding=\"3\" cellspacing=\"2\">\n <thead>\n    <tr  class=\"tablepageheader\">");
   
   if  (mysql_num_rows($result)>0)   {
                   //loop  thru  the  field  names  to  print  the  correct  headers
                   $i  =  1;
                   while  ($i  <  mysql_num_fields($result))
                   {
             echo  "<th align=\"center\">".  mysql_field_name($result,  $i)  .  "</th>";
             $i++; 
       }
       echo  "</tr></thead>";

       //display  the  data

       $RowStyle = "RowEven";
       while  ($rows  =  mysql_fetch_array($result,MYSQL_ASSOC))
       {  			  if ($RowStyle == "roweven")	{
    			     $RowStyle = "rowodd";
       			  } else	{
    			     $RowStyle = "roweven";
           		  }  //end Rowstyle
          	echo ("<tr class=\"$RowStyle\">");
      		foreach($rows as $field=>$data)
		{              if ($field != mysql_field_name($result,  0)) 
			       {
				       	echo  "<td  align='center'>";
				       	if ($field == $this->anchor){
           	echo ("<a href=".$this->next.$rows[$this->nextID].">");
				       	}
					echo         $data  ;
                                         if ($field == $this->anchor){
				       	       echo "</a>";
					       }
					echo "</td>";
       			}
		}
		     
		     
      }
   }else{
       echo  "<tr><td  colspan='"  .  ($i+1)  .  "'>No  Results  found!</td></tr>";
   } 
   echo  "</tbody></table></td></tr></table></p>";
}else{ 
   echo  "Error  in  running  query  :".  mysql_error(); 
} 
 return $result;
}

function makeInfo() {
//$query  =  "select  field1,  fieldn  from  table  [where  clause][group  by  clause][order  by  clause][limit  clause]";

$result = mysql_query($this->sql);
if  (($result)||(mysql_errno  ==  0))
{

   if  (mysql_num_rows($result)>0)   {
                   //loop  thru  the  field  names  to  print  the  correct  headers
       while  ($rows  =  mysql_fetch_array($result,MYSQL_ASSOC)) 
       {                    $i  =  0;
                   while  ($i  <  mysql_num_fields($result))
                   {
             echo  "<div class=\"row\"><span class=\"infolabel\">".  mysql_field_name($result,  $i)  .  "</span>";
             echo  "<span class=\"info\">";
	     if  (mysql_field_name($result,  $i) == $this->anchor)
	     {
	     	echo ("<a href=".$this->next.$rows[$this->nextID].">");
	     }
	     echo  $rows[mysql_field_name($result,  $i)];
	     	     if  (mysql_field_name($result,  $i) == $this->anchor)
	     {
	     	echo ("</a>");
	     }
	     echo  "</span>";
             echo  "</span></div>";
             $i++; 
       } 


       //display  the  data


       }
   }else{
       echo  "'>No  Results  found!";
   }
   echo  "";
}else{
   echo  "Error  in  running  query  :".  mysql_error(); 
}
 return $result;
}





function makeList() {
//$query  =  "select  field1,  fieldn  from  table  [where  clause][group  by  clause][order  by  clause][limit  clause]";
echo $this->sql;
$result = mysql_query($this->sql);
if  (($result)||(mysql_errno  ==  0))
{ 
   echo "<ul>";
   if  (mysql_num_rows($result)>0)   {
       while  ($rows  =  mysql_fetch_array($result,MYSQL_ASSOC))
	{
	echo ("<li class=\"$this->listclass\">");
           foreach  ($rows  as  $field=>$data)
           {
              if ($field == $this->anchor){
           	echo ("<a href=".$this->next.$rows[$this->nextID].">");
				       	}
					echo         $data  ;
                                         if ($field == $this->anchor){
				       	       echo "</a>";
					       }
           }
           echo "</li>";
       }
   }else{
       echo  " ";
   }
   echo  "</ul>";
}else{ 
   echo  "Error  in  running  query  :".  mysql_error(); 
}
 return $result;
}

function makeToc() {
//$query  =  "select  field1,  fieldn  from  table  [where  clause][group  by  clause][order  by  clause][limit  clause]";

$result = mysql_query($this->sql);
if  (($result)||(mysql_errno  ==  0))
{

   if  (mysql_num_rows($result)>0)   
   {
       while  ($rows  =  mysql_fetch_array($result,MYSQL_ASSOC))
	{
	      echo ("<li class=\"$this->listclass\">");
           foreach  ($rows  as  $field=>$data) 
           {  if ($field != 'displaynone'){
              if ($field == $this->anchor){
           	echo ("<a href=\"".$this->next.$rows[$this->nextID]."\">");
				       	}
					echo         $data  ;
                                         if ($field == $this->anchor){
				       	       echo "</a>";
					       }
           }
           
 }  echo "</li>";
       }
   }else{
       echo  "";
   }

}else{ 
   echo  "Error  in  running  query  :".  mysql_error(); 
} 
 return $result;
}

}
?>
