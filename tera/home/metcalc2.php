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

 The following variables are derived on extraction from e-RA:


 * DDA: Day Degrees Above a base temperature (TLIM)
 * DDB: Day Degrees Below a base TLIM
 * ACCDDA: Accumulated Day Degrees Above TLIM
 * ACCDDB: Accumulated Day Degrees Below TLIM
 * PSMD: Potential Soil Moisture Deficit (mm)
 * APSMD: Accumulated Potential Soil Moisture Deficit (mm)
 * RELH: Relative humidity at 0900 GMT (% value of saturation value)
 * EVAPG: Evaporation over Grass (mm)
 * EVAPW: Evaporation over Water (mm)
 * VAP: Vapour pressure (mb)

 The following variables can be calculated if values are missing:

 * WINDRUN: Run of wind in 24h, 0900GMT to 0900GMT
 * DEWP: Dew point (ºC)
 * RAD: Radiation

 Other definitions:

 * AVTEMP: Average temperature (ºC)
 * TRANGE: Temperature range (ºC)
 * TMIN: Daily minimum temperature (ºC)
 * TMAX: Daily maximum temperature (ºC)
 * TLIM: The (arbitrary) limiting or base temperature (set by user)
 * WETB: Wet bulb temperature (ºC)
 * DRYB: Dry bulb temperature (ºC)
 * WINDSP: Wind speed at 0900GMT (m/s)
 * RAIN: Rainfall in 24h, 0900GMT to 0900GMT (mm)
 * RDUR: Rainfall duration, 0900GMT to 0900GMT (h)
 * SUN: Hours of sunshine (h)

 Calculation of Temperature derived Items:

 TRANGE = TMAX - TMIN
 AVTEMP = (TMAX+TMIN)/2

 Calculation of DDA Day Degrees Above a base temperature: (TLIM )

 If TMIN >= TLIM then DDA = AVTEMP - TLIM
 If TMAX< = TLIM then DDA = 0
 If (TMAX - TLIM) >= (TLIM - TMIN) then DDA = (TMAX - TLIM)/2 - (TLIM - TMIN)/4

 If none of the above then DDA = (TMAX - TLIM)/4

 Calculation of DDB Day Degrees Below a base temperature (TLIM)

 If TMIN > = TLIM then DDB = 0
 If TMAX <= TLIM then DDB = TLIM - AVTEMP
 If (TMAX - TLIM) >= (TLIM - TMIN) then DDB = (TLIM - TMIN)/4
 If none of these then DDB = (TLIM - TMIN)/2 - (TMAX - TLIM)/4

 ACCDDA & ACCDDB
 Accumulated day degree data: this is a running total, and an arbitrary start date has to
 be provided.
 Note: these calculations are provided from the standard found in the Energy Efficiency
 Office Fuel Efficiency Booklet 7 Degree Days (Published 1985).

 Calculation of wind run (WINDRUN) (only to be used if data is missing)

 WINDRUN = WINDSP * 86.4 (this is conversion from m/s to km/24 hours).

 Calculation of actual vapour pressure (VAP) (after Buck, 1981 and FAO, 2006)

 If WETB > 0, VAP= 6.1375*EXP(17.502*WETB/(240.97+WETB))-0.799*(DRYB-WETB)
 If WETB <=0, VAP=6.1389*EXP(22.452*WETB/(272.55+WETB))-0.720*(DRYB-WETB)

 >>>At Woburn VAP has been calculated within the datalogger from Relative Humidity (RELH)
 >>> and DRYB only since Dec 2009, based on Campbell Scientific Technical Note 16:

 >>> SVAP=6.107799961+DRYB*(4.436518521*10-1+DRYB*(1.428945805*10-2+DRYB*(2.650648471*10-4+DRYB*(3.031240396*10-6+DRYB*(2.034080948*10-8+6.136820929*10-11*T))))) (Lowe, 1977)
 >>> VAP = RELH * SVAP/100

 >>> SVAP = Saturated vapour pressure for the air temperature range of -50°C to +50°C
 >>> taken from Lowe, Paul R. 1977. "An approximating polynomial for computation of saturation vapour pressure". J. Appl. Meteor. 16:100-103
 >>> Calculation of dew point (DEWP)

 DEWP= 240.97*LOGn (VAP/6.1375)/(17.502-LOGn(VAP/6.1375)) (Buck, 1981)

 NB: this may be provided from the automatic weather station. This calculation gives only an approximation of the dew point.

 Calculation of Relative Humidity, RELH
 SVAP = Saturated vapour pressure
 VAP = Actual vapour pressure (see above)
 SVAP = 6.1375*EXP(17.502*DRYB/(240.97+DRYB))
 SVAP = 6.1375*EXP(17.502*DRYB/(240.97+DRYB)) (Buck, 1981)
 RELH = 100 * (VAP/SVAP)

 Definitions and intermediate calculations for RAD, EVAPG, EVAPW and PSMD
 Cos, sin and tan have the usual trigonometric meanings
 Sqrt the square root function
 nday_val is the day number (Julian date) of the record in question e.g. 1st Feb. = 32
 days_in_year ordinarily is 365, but 366 in a leap year
 stn_latitude is the latitude of the station in question: Rothamsted = 51.81ºN
 Woburn = 52.017 ºN Brooms Barn = 52.267 ºN.
 hrday is the maximum amount of sunshine in hours, that a latitude can receive. (i.e. cloudless all day)
 sunfr is the sun fraction, the ratio of recorded hours of sun to the maximum possible
 HMM is the evaporation term from net radiation over grass
 EA_GRASS is the evaporation term from humidity differences over grass
 EA_WATER is the evaporation term from humidity differences over water
 angnd = (6.28318 *(nday_val - days_in_year + 193))/days_in_year
 csd = cos(angnd)
 snd = sin(angnd)
 cs2d = (csd + snd)*(csd - snd)
 sn2d = 2*csd*snd
 sndecl = 0.00678 + (0.39762*csd)+(0.00613*snd)-(0.00661*cs2d)-(0.00159*sn2d)
 csdecl = sqrt(1 - sndecl*sndecl)
 csl = cos((stn_latitude*3.14159)/180)
 snl = sin((stn_latitude*3.14159)/180)
 cshass = (-0.014544 - (snl*sndecl))/(csl*csdecl)
 snhass = sqrt(1 - cshass*cshass)
 hass = atan(snhass/cshass) if hass < 0 then hass = hass + 3.14159
 hrday = hass*24/3.14159
 sunfr = SUN/ hrday

 Evaporation Items
 Exp is the exponential function (ex)
 ** is the exponentiation function (xn)
 d0g is a correction factor for grass: 0.75
 d1g is a correction factor for grass: 1
 d0w is a correction factor for water: 0.95
 d1w is a correction factor for water: 0.5
 c1 is a constant: 4.0621 * 10-7
 c2 is a constant: 3.721432778 x 107

 The relative humidity (RELH) expresses the degree of saturation of the air as a
 ratio of the actual (VAP) to the saturation (Es) Vapour pressure at
 the same temperature (From FAO doc 56, 2006, Irrigation and Drainage,
 Chapter 3, Meteorological data).

 Note that these values are not exactly the same as for SVAP.
 avt = AVTEMP + 237.3
 Es = 6.1078 * exp((17.269 * AVTEMP) / avt)
 (Es = saturated vapour pressure at Avtemp)
 delta = (4097.93 * Es) / (avt * avt)
 sunfr = SUN/ hrday
 fnt2 = (0.0048985 * (AVTEMP + 273.0) ** 4) *(0.47- (0.065 * sqrt(VAP))) * (0.17 + 0.83 * sunfr)
 exel:
 fnt2 = (0.0048985 * (AVTEMP + 273.0) ^ 4) *(0.47 - (0.065 * SQRT(VAP))) * (0.17 + 0.83 * sunfr))

 ev1 = c1 * delta
 Calculation of Radiation (RAD) (only to be used if data is missing)
 inv = 1.00011 - (0.03258*csd)-(0.00755*snd)+(0.00064*cs2d)+(0.00034*sn2d)
 RAD = (0.16+(0.62*(((SUN)/hrday))))*c2*inv*((csl*csdecl*snhass) + (snl*sndecl*hass))
 NB: The calculated value for radiation should be divided by 1,000,000 to express MJ rather than joules of energy.
 Calculation of Evaporation over grass (EVAPG)
 EA_GRASS = 0.2625 * ((6.1078 * exp((17.269 * AVTEMP)/(237.3 + AVTEMP)) - (VAP)* (d1g + (WINDRUN* .0062137)))
 if EA_GRASS < 0 then EA_GRASS = 0
 hj_g = d0g * (1000000 * RAD) - fnt2
 EVAPG = ( (hj_g * ev1) + (0.66 * EA_GRASS )) / (delta + 0.66)
 HMM = (hj_g * ev1)/ 0.66
 Calculation of Evaporation over water (EVAPW)

 EA_WATER = 0.2625 * ((6.1078 * exp((17.269 * AVTEMP)/(237.3 + AVTEMP)) - (VAP)*(d1w + (WINDRUN * 0.0062137)))
 in exel:
 (0.2625*(Es - VAP))*(0.5+(WINDRUN*0.0062137) same
 if EA_WATER < 0 then EA_WATER = 0;
 hj_w = d0w * (1000000 * RAD) fnt2
 EVAPW = ((hj_w * ev1) + (0.66 * EA_WATER )) / (delta +0.66)

 The calculation of EA, HMM, EVAPG and EVAPW are described in detail in
 "The Evaluation of Penman's Natural Evaporation Formula by Electronic Computer"
 G. Berry, Aust. J. Appl. Sci, 1964, 15: 61-64.

 Calculation of Potential Soil Moisture Deficit (PSMD)
 PSMD = APSMD + EVAPG - RAIN (Not negative)
 Where APSMD is the accumulated PSMD so far.
 PSMD is an accumulated value, starting at 0.0 on January 1st.
 This measures the loss of moisture in the soil;
 and while the daily value may be significant it is
 usually calculated over some months at least. Technically it is an
 accumulation, and into the summer will usually show a net loss.
 The value can never be negative, as if precipitation exceeds evaporation
 together with any deficit to date,
 this forms runoff and contributes to surface water flow.


 */

/*
 * Functions
 Rothamsted = 51.81ºN
 Woburn = 52.017 ºN
 Brooms Barn = 52.267 ºN.
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
		if ($rad[1] === "J/cm2") {
			$dd['rad'] = $rad[$i]/100; 
		} else {
		$dd['rad'] = $rad[$i];
		}
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




<h1>Calculating Met Data v 0.2.0</h1>

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

		//echo $data->dump($row_numbers=false,$col_letters=false,$sheet=0,$table_class='excel');
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

