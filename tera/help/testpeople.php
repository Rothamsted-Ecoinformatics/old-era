<h2>testing Bioweb class</h2>



<?php
$sql = "SELECT PeopleID as 'index', fname as 'First Name', lname as 'Last Name', Acronyme as 'Division' from `People`, `Divisions` Where Divisions.DivisionID = People.DivisionID order by lname";

$table1 = new Query;
$table1->sql = $sql;
$table1->next = 'index.php?area=projects&amp;page=people&amp;people=';
$table1->nextID = 'index';
$table1->anchor = 'Last Name';
$table1->display = 'info';
$table1->displayResults();




/*
$sql2 = "SELECT fname as 'First Name', lname as 'Last Name', Acronyme as 'Division' from `People`, `Divisions` Where Divisions.DivisionID = People.DivisionID
 and PeopleID = 23 order by lname";

$table2 = new Query;
$table2->sql = $sql2;     // the query used to generate the list
$table2->next = 'index.php?area=projects&amp;page=people&amp;people=';     //the next page viewed when one
$table2->nextID = 'index';
$table2->anchor = 'Last Name';
$table2->display = 'list';
$table2->displayResults();
*/

?>
