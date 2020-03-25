<?php
//version 0.1.5: has dda and ddb, and accdda and accddb and header. Working
//version 0.1.6: vap is working
//version 0.1.7: has dewp, values formated at 4
//version 0.1.8: has relh but some are above 100 but thats ok as it is the same in the spreasheet
//version 0.1.9: has up to hrday
//version 0.2.0: has all the variables and is checked,
/*
 *
 *

 /*
  * 
  */



function get($head)
{
	global $data;
	$nbCols =  $data->colcount(1)+1;
	$nbRows = $data->rowcount(1);
	//First, find day
	for ($col = 0; $col < $nbCols; $col++) {

		for ($row = 0; $row < $nbRows; $row++) {

			if ($data->val($row,$col,0)=== $head)
			{

				$coordDAY = $row.",".$col;
				//echo $data->val($row,$col,0)." = " . $coordDAY."<br />";

			} else
			{}

		}

	}

	$coordDAYS = explode(',', $coordDAY) ;
	$i=0;
	for ($row = $coordDAYS[0]; $row<$nbRows; $row++)
	{
		$header[$i] = $data->val($row, $coordDAYS[1],0);
		//echo ($row." - ".$coordDAYS[1]." - ".$day[$i]."<br />");
		$i++;
	}
	return $header;
}
function is_leap_year($year)
{
	return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0)));
}


function get_dds($i)
{
	global $day;
	global $tmax;
	global $tmin;
	global $wetb;
	global $dryb;
	global $rain;
	global $sun;
	global $rad;
	global $windrun;
	global $ddlim;
	global $relh;
	global $leap;

	$d0g=0.75;
	$d1g = 1;
	$d0w = 0.95;
	$d1w = 0.5;
	$c1 = 4.0621 *pow(10,-7);
	$c2 = 3.721432778 * pow(10,7);
	if (!$lat) {$lat = 51.81;} // rothamsted}

	if (is_numeric($tmax[$i]) && is_numeric($tmin[$i]))
	{
		$dd['avtemp'] = ($tmax[$i]+$tmin[$i])/2;
		$dd['es'] = exp((17.269*$dd['avtemp'])/(237.3+$dd['avtemp'])); //works

		if (!$day) {}
		else {
			if ($tmin[$i] >= $ddlim)
			{
				$dd['dda'] = $avtemp - $ddlim;
				$dd['ddb'] = 0;
			}
			else
			{
				if ($tmax[$i] <= $ddlim)
				{
					$dd['dda'] = 0;
					$dd['ddb'] = $ddlim - $avtemp;
				}
				else
				if (($tmax[$i] - $ddlim) >= ($ddlim - $tmin[$i]))
				{
					$dd['dda'] = (($tmax[$i] - $ddlim)/2) - (($ddlim-$tmin[$i])/4);
					$dd['ddb'] = ($ddlim - $tmin[$i])/4;
				}
				else
				{
					$dd['dda'] = ($tmax[$i] - $ddlim)/4;
					$dd['ddb'] = (($ddlim - $tmin[$i])/2 )- (($tmax[$i] -$ddlim)/4);
				}
			}
		}
	}
	if (!$day[$i])
	{
		$dd['vap'] =  '';
		$dd['svap'] =  '';
	}
	else
	{
		if ($wetb[$i] <= 0)
		{
			$dd['vap'] = 6.1389*exp(22.452*$wetb[$i]/(272.55+$wetb[$i]))-0.720*($dryb[$i]-$wetb[$i]);

		}
		else
		{
			$dd['vap'] = 6.1375*exp(17.502*$wetb[$i]/(240.97+$wetb[$i]))-0.799*($dryb[$i]-$wetb[$i]);

		}
	}
	$dd['dewp']= 240.97*log($dd['vap']/6.1375)/(17.502-log($dd['vap']/6.1375));

	if (!$day[$i]) {$dd['relh'] =  '';$dd['relh'] =  '';}
	else
	{
		$dd['svap'] = 6.1375*exp(17.502*$dryb[$i]/(240.97+$dryb[$i]));
		$dd['relh'] = 100*$dd['vap']/$dd['svap'];
	}

	$dd['ndays'] = 1+(strtotime($day[$i]) - strtotime($day[2]))/(60*60*24);

	$dd['angnd'] = (6.28318*($dd['ndays']+193-(365+$leap)))/(365+$leap);

	$dd['sndecl'] = 0.00678 + cos($dd['angnd'])*0.39762 + sin($dd['angnd'])*0.00613-(cos($dd['angnd'])*
	cos($dd['angnd'])-sin($dd['angnd'])*sin($dd['angnd']))*0.00661-cos($dd['angnd'])*sin($dd['angnd'])*
	0.00318;

	$dd['csdecl'] = sqrt(1-$dd['sndecl']*$dd['sndecl']);

	$dd['csl'] = cos(($lat*3.14159)/180);
	$dd['snl'] = sin(($lat*3.14159)/180);
	$dd['csd'] = cos($dd['angnd']);
	$dd['snd'] = sin($dd['angnd']);
	$dd['cs2d'] = ($dd['csd'] + $dd['snd'] )*($dd['csd'] - $dd['snd'] );
	$dd['sn2d'] = 2*$dd['csd']*$dd['snd'] ;
	$dd['sndecl2'] = 0.00678 + (0.39762*$dd['csd']) + (0.00613*$dd['snd']) - (0.00661*$dd['cs2d']) - (0.00159*$dd['sn2d'] );

	$dd['csdecl2'] = sqrt(1-$dd['sndecl2']*$dd['sndecl2']);
	$dd['cshass'] = (-0.014544 - ($dd['snl']*$dd['sndecl']))/($dd['csl']*$dd['csdecl']);
	$dd['snhass'] = sqrt(1 - $dd['cshass']*$dd['cshass']);
	$dd['hass'] = atan($dd['snhass']/$dd['cshass']);

	if ($dd['hass'] < 0)
	{
		$dd['hass'] = $dd['hass'] + 3.14159;
	}
	$dd['hrday'] = 24*$dd['hass']/3.14159;
	$dd['sunfr'] = $sun[$i]/ $dd['hrday'];
	$dd['avt'] = $dd['avtemp'] + 237.3;
	$dd['Es'] = 6.1078 * exp((17.269 * $dd['avtemp']) / $dd['avt']) ;
	$dd['es'] = exp((17.269*$dd['avtemp'])/(237.3+$dd['avtemp'])); //works
	$dd['delta'] = (4097.93 *  $dd['Es']) / ($dd['avt'] * $dd['avt']);
	$dd['fnt2'] = (0.0048985 * pow(($dd['avtemp'] + 273.0) , 4)) *(0.47- (0.065 * sqrt($vap[$i]))) * (0.17 + 0.83 * $dd['sunfr']);
	$dd['ev1'] = $c1 * $dd['delta'];
	if(!is_numeric($rad[$i]))
	{
	 $dd['inv'] = 1.00011 - (0.03258*$dd['csd'])-(0.00755*$dd['snd'] )+(0.00064*$dd['cs2d'])+(0.00034*$dd['sn2d']);
	 $dd['rad'] = (0.16+(0.62*((($sun[$i])/$dd['hrday']))))*$c2*$dd['inv']*(($dd['csl']*$dd['csdecl']*$dd['snhass']) + ($dd['snl']*$dd['sndecl']*$dd['hass']));
	}
	else
	{
		$dd['rad'] = $rad[$i];
	}

	$dd['ea_grass'] = 0.2625 * ((6.1078 * exp((17.269 * $dd['avtemp'])/(237.3 + $dd['avtemp'])
	-($dd['vap'])*($d1g +($windrun[$i]* 0.0062137)))));

	if ($dd['ea_grass'] < 0 )
	{
		$dd['ea_grass'] = 0;
	}
	$dd['hj_g'] = $d0g * (1000000 * $dd['rad']) - $dd['fnt2'];
	$dd['evapg'] = ( ($dd['hj_g'] * $dd['ev1']) + (0.66 * $dd['ea_grass'] )) / ($dd['delta'] + 0.66);
	$dd['hmm'] = ($dd['hj_g'] * $dd['ev1'])/ 0.66;

	$dd['ea_water']= 0.2625 * ((6.1078 * exp((17.269 * $dd['avtemp'])/(237.3 + $dd['avtemp'])) - ($dd['vap'])*($d1w + ($windrun[$i] * 0.0062137))));
	if ($dd['ea_water'] < 0 ) {
		$dd['ea_water'] = 0;
	}
	$dd['hj_w'] = $d0w * (1000000 * $dd['rad']) - $dd['fnt2'];
	$dd['evapw'] = (($dd['hj_w'] * $dd['ev1']) + (0.66 * $dd['ea_water'] )) / ($dd['delta'] +0.66);


	return $dd;
}

function formatResults(&$value, $key)
{

	$value  = number_format((float)$value, 2, '.', '');

}


//////////////////////////////////////////////////////////////////////////////////

$xfile = $_FILES["fileName"]["tmp_name"];
$message =  "Upload: " . $_FILES["fileName"]["name"] . "<br>";
$message .= "Type: " . $_FILES["fileName"]["type"] . "<br>";
$message .= "Size: " . ($_FILES["fileName"]["size"] / 1024) . " kB<br>";
$message .= "Stored in: " . $_FILES["fileName"]["tmp_name"]. "<br>";

if ($_POST[lat]){$lat = $_POST[lat];}
if ($_POST[ddlim]){$ddlim = $_POST[ddlim];}


?>

<script>
function loadDoc() {
	  var xhttp;
	  if (window.XMLHttpRequest) {
	    // code for modern browsers
	    xhttp = new XMLHttpRequest();
	    } else {
	    // code for IE6, IE5
	    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xhttp.onreadystatechange = function() {
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	      document.getElementById("demo").innerHTML = xhttp.responseText;
	    }
	  };
	  xhttp.open("GET", "ajax_info.txt", true);
	  xhttp.send();
	}
</script>


<h1>Calculating Met Data v 0.2.0</h1>
<p id="demo">Let AJAX change this text.</p>
<button type="button" onclick="loadDoc()">Change Content</button>
<h2>Step 1: import your data</h2>
<form
	action=""
	method="post"
	name="formImport"
	enctype="multipart/form-data">

	<input
		name="fileName"
		type="file"> <br /> 	

		
DDLIM = <input name = "ddlim">
<select name="lat">
  
    <option value="52.267">Broom's Barn</option>
    <option value="51.81">Rothamsted</option>
    <option value="52.017">Woburn</option>

</select>

<br />
<input type = "submit">
		<?php
		echo $message ."<br />";
		error_reporting(E_ALL ^ E_NOTICE);
		require_once 'includes/excel_reader2.php';
		$data = new Spreadsheet_Excel_Reader($xfile);
		$message = "<br />The loaded file is: <b>".$xfile;

		//echo $data->dump($row_numbers=false,$col_letters=false,$sheet=1,$table_class='excel');
		//	$xlBookID = $data->val(9,'B',0);
		//	$xlFolderID = $data->val('10','B',0);
		/*
		 * This function will find the column in the table that has the values for that day
		 */
		$rows = $data->rowcount(1);
		$cols = $data->colcount(1);
		$day = get ('day');
		$tmax = get ('tmax');
		$tmin = get ('tmin');
		$wetb = get ('wetb');
		$dryb = get ('dryb');
		$relh = get ('relh');
		$rain = get ('rain');
		$sun = get ('sun');
		$rad = get ('rad');
		$windrun = get ('windrun');
		$date = explode ('/',$day[3]);
		$year = $date[2];
		$leap = is_leap_year($year);
		
	
		?>

	<table
		class="excel"
		border="0"
		width="800px">
		<tr>
			<td width="400px"><p>You need to extract the following data from eRA
					met data and export the result table as an XLS file (not XLSX).</p>
				<ul>
					<li>TLIM: The (arbitrary) limiting or base temperature (set by
						user)</li>
					<li>DAY: Date of measurements</li>
					<li>TMAX: Daily maximum temperature (&deg;C)</li>
					<li>TMIN: Daily minimum temperature (&deg;C)</li>
					<li>WETB: Wet bulb temperature (&deg;C)<br />or SVAP:Saturated
						vapour pressure for the air temperature range of -50&deg;C to
						+50&deg;C</li>
					<li>DRYB: Dry bulb temperature (&deg;C)</li>
					<li>RAIN:</li>
					<li>SUN:</li>
					<li>RAD:</li>
					<li>WINDRUN:</li>
				</ul></td>
			<td width="250px"><p>You will be returned the folowing calculated
					variables:</p>
				<ul>
					<li>VAP:</li>
					<li>RH:</li>
					<li>PSMD:</li>
					<li>DDA:Day Degrees Above a base temperature (TLIM)</li>
					<li>DDB:Day Degrees Below a base TLIM</li>
					<li>ACCDDA: Accumulated Day Degrees Above TLIM</li>
					<li>ACCDDB: Accumulated Day Degrees Below TLIM</li>
					<li>EVAP_G:</li>
					<li>EVAP_W:</li>
				</ul></td>
		</tr>
	</table>
	<table
		class="excel"
		id="metdata">
		<tr>
			<th>DDLIM</th>
			<th><?php echo $ddlim ;?></th>

		</tr>
				<tr>
			<th>Lattitude</th>
			<th><?php echo $lat ;?></th>

		</tr>
	</table>

	<table
		class="excel"
		id="metdata">

		<tr id="Headers">
			<th id="day"><?php  echo strtoupper($day[0]);?></th>
			<th>ROW</th>
			<th>Day Number</th>
			<th id="tmax"><?php echo strtoupper($tmax[0]);?></th>
			<th id="tmin"><?php echo strtoupper($tmin[0]);?></th>
			<th id="wetb"><?php echo strtoupper($wetb[0]);?></th>
			<th id="dryb"><?php echo strtoupper($dryb[0]);?></th>
			<th id="rain"><?php echo strtoupper($rain[0]);?></th>
			<th id="sun"><?php echo strtoupper($sun[0]);?></th>
			<th id="rad"><?php echo strtoupper($rad[0]);?></th>
			<th id="windrun"><?php echo strtoupper($windrun[0]);?></th>
			<th>VAP</th>
			<th id="rh">RH (%)</th>
			<th id="rh">DEWP</th>
			<th>PSMD</th>
			<th>DDA</th>
			<th>DDB</th>
			<th>AVTEMP</th>
			<th>EVAP_G</th>
			<th>EVAP_W</th>
			<th>ACDDA</th>
			<th>ACDDB</th>
			<th>
		
		</tr>

		<?php
		$accdda = 0;$accddb = 0;$psmd = 0;$apsmd = 0;
		for ($row = 1; $row<count($day); $row++)
		{ if ($row >1){
			$dd = get_dds($row);array_walk($dd, 'formatResults');
		}

		$date = date ('d/m/Y', strtotime($day[$row]));
		$yesterday = date ('d/m/Y', strtotime($day[$row]. ' - 1 days' ));
		$today = date ('d/m/Y', strtotime($yesterday. ' + 1 days' ));
		if ($date==$yesterday + 1)
		{
			$accdda = $accdda + $dd['dda'];
			$accddb = $accddb + $dd['ddb'];

		}
		if ($date) {
			if ($row < 4)
			{
				$psmd=0;
			}
			$psmd = $psmd + $dd['evapg'] - $rain[$row];
			if ($psmd<0) {$psmd = 0;$apsmd = 0;}
		}
		$dd['ndays'] = number_format((integer)$dd['ndays']);

		$line = '<tr><td>';
		$line .= $date;
		$line .= '</td><td>';
		$line .= $row;
		$line .= '</td><td>';
		$line .= $dd['ndays'];
		$line .= '</td><td>';
		$line .= $tmax[$row];
		$line .= '</td><td>';
		$line .= $tmin[$row];
		$line .= '</td><td>';
		$line .= $wetb[$row];
		$line .= '</td><td>';
		$line .= $dryb[$row];
		$line .= '</td><td><b>';
		$line .= $rain[$row];
		$line .= '</b></td><td>';
		$line .= $sun[$row];
		$line .= '</td><td>';
		$line .= $rad[$row];
		$line .= '</td><td>';
		$line .= $windrun[$row];
		$line .= '</td><td>';
		$line .= $dd['vap'];
		$line .= '</td><td>';
		$line .= $dd['relh'];
		$line .= '</td><td>';
		$line .= $dd['dewp'];
		$line .= '</td><td>';
		$line .= $psmd;
		$line .= '</td><td>';
		$line .= $dd['dda'];
		$line .= '</td><td>';
		$line .= $dd['ddb'];
		$line .= '</td><td>';
		$line .= $dd['avtemp'];
		$line .= '</td><td><b>';
		$line .= $dd['evapg'];
		$line .= '</b></td><td>';
		$line .= $dd['evapw'];
		$line .= '</td><td>';
		$line .= $accdda;
		$line .= '</td><td>';
		$line .= $accddb;
		$line .= '</td></tr>';
		echo $line;

		}
		?>

	</table>
</form>

