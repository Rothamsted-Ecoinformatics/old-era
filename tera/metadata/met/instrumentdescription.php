<?php
$KeyRef = "KeyRefMetdatavars";

?>

<h1><B>Measurement of variables at Rothamsted and Woburn </B></h1>

<p></p>

<UL>
<LI><A href="<?php echo $request; ?>#SEC1">Rainfall</A> </LI>
<LI><A href="<?php echo $request; ?>#SEC2">Percolation (drainage)</A> </LI>
<LI><A href="<?php echo $request; ?>#SEC3">Temperature:</A> Air and soil temperatures</LI>
<LI><A href="<?php echo $request; ?>#SEC4">Sunshine hours</A></LI>
<LI><A href="<?php echo $request; ?>#SEC5">Solar Radiation</A></LI>
<LI><A href="<?php echo $request; ?>#SEC6">Wind</A></LI>
<LI><A href="<?php echo $request; ?>#SEC7">Evaporation</A></LI>
<LI><A href="<?php echo $request; ?>#SEC8">Relative Humidity</A></LI>
<LI><A href="<?php echo $request; ?>#SEC9">Vapour pressure</A></LI>
<LI><A href="<?php echo $request; ?>#SEC10">Barometric pressure</A></LI>
<LI><A href="<?php echo $request; ?>#SEC11">Other variables</A></LI>
<LI><A href="<?php echo $request; ?>#SEC12">References</A></LI>
</UL>

<A NAME="SEC1"></a>
<h2>Rainfall</h2>

<p><B>Rothamsted:</B> Rainfall has been measured at Rothamsted since 1853, in various rain gauges. Data is shown here for three, <b>RAIN, RAIN5 and RAINL:</b> </p>

<p>The variable <B>RAIN </B> was originally recorded in a 5 inch (12.7cm) rain gauge built in a garden near the laboratory in 1852. The water collected was measured in a graduated cylinder until about 1880. 
The gauge was then moved to the meteorological enclosure. In 1948, a 5 inch (12.7cm) copper rain gauge of Meteorological Office standard was installed within a 0.3 m high, 1.5 m radius turf wall retained by 
brick to reduce wind eddies. Since 2004, when the met station was automated, <B>RAIN </B> has been measured by an electronic tipping bucket rain gauge of 25.4cm diameter, calibrated to tip at 0.2mm, also within the turf wall.
The old 5 inch  manual copper rain gauge is still used to measure precipitation fallen as snow when the tipping bucket rain gauge is blocked with snow or ice.      </p>
<p>The manufacturers of the ARG100 state that the "ARG100 rain gauge typically captures over 5% more rainfall than
most traditionally-shaped cylindrical gauges due to its unique aerodynamic shape and reduced evaporation-loss properties". This has found to be the case at Rothamsed. A review of the differences in rainfall capture
between the ARG100 and the manual 5 inch gauge at Rothamsted was conducted.  Using a double mass curve analysis, annual data from 1990-2017, and looking at each added year from 2004 (when the ARG100 was introduced),
the overall correction factor is 1.1 or 10%. This means that the ARG100 captures 10% more rainfall than the manual 5 inch gauge. This correction is only applicable to annual and monthly totals, and to the variable 
<b>RAIN</b> at Rothamsted (ie <b>ROTHMET</b> only). It is not applicable to <b>RAINL</b> or <b>RAIN5</b>. To convert 5 inch data to ARG100 data, multiply by 1.1. To convert ARG100 data to 5 inch, divide by 1.1.
We recommend that when you download data that spans both gauges, you multiply the 5 inch data by 1.1. Please contact the e-RA curators for more information.
 </p>
<p>The variable <b>RAIN5 </b> was originally recorded in another 5 inch (12.7cm) cooper rain gauge, established in 1873. Data was not recorded in e-RA after 1987. RAIN and RAINL are two separate gauges, hence the values do not exactly agree.  </p> 

<p>Data is available for RAIN from 05/02/1853 - present, except between 1880-1914. It is recommended that for a complete run of data from a standard rain gauge that a composite of RAIN and RAIN5 is used, based on RAIN, with data from RAIN5 being used from 1880-1914 only. Please contact the <a href= "mailto:era@rothamsted.ac.uk"> e-RA Curators</a> for this data.</p>

<p>The variable <B> RAIN_L</B> measures rain in a gauge of 1/1000th of an acre (4.047 sq metres), built in 1852/53. The gauge was constructed of timber with a lead funnel. Rain was collected daily  in carboys and weighed to estimate the amount of rain. In 1873 a new gauge was installed and the carboys replaced by galvanized iron  calibrated cylinders to measure rainfall. The old gauge was replaced by an identical new one in 1992. For details of the early history of the 1/1000th acre rain gauge, see Lawes, Gilbert & Warington, 1881 (J Royal Agric Soc <b> 17</b>: 241-279) or contact the <a href= "mailto:era@rothamsted.ac.uk"> e-RA Curators</a>. </p>

<p>From 2004 onwards the calibrated  cylinders were replaced by an electronic tipping bucket rain gauge (Campbell Scientific, ARG100) calibrated to tip with every 0.0025mm of  rain. In July 2010 the lead lining was stolen and it was replaced by a new stainless steel funnel of grade 316 and dimensions 2213mm x 1829mm in February 2011. No RAIN_L data was collected for this period. </p>

<p>Since 2004, when the met station was automated, RAINL may have been underestimating rainfall when rain is intense. RAINL should only be used in conjunction with the drainage data, which has the same surface area (DR20, DR40, DR60). For general daily rainfall data please use RAIN. It is recommended that if you use RAINL, RAIN should be used as a check.</p>


<p><b>"Missing values"</b> There are many instances before 2004 when no data is shown for RAIN and RAINL. This is because a 'trace' 
of rain, snow, mist, dew or fog was manually recorded. A 'trace' is less than 0.05mm. For most purposes a missing value can be assumed to be zero. However, if you would like further details of traces of rain recorded between 1853 and 2003, please contact the <a href= "mailto:era@rothamsted.ac.uk"> e-RA Curators.</a> </p>
<p> Rain duration <B>RDUR</B> has been measured at Rothamsted since 1931. It is defined as the number of hours during which rain fell over
 the previous 24 hours, recorded at 0900 GMT each day. Originally it was measured by a Negretti and Zamra natural siphon rain recorder.
 Rain was collected in a float chamber and recorded on a daily chart on a clock drum, which recorded 10mm of rain before siphoning 
began and the recording restarted at the bottom of the chart. In 1978 this was replaced with a Cassella recorder with a diameter
 of 20.3cm.  Since 2004 it has been measured by an electronic tipping bucket rain gauge. </p>

</p>
<p><B> Woburn: </B> Rainfall (<B>RAIN</B>) was originally measured manually using a 5" (12.7cm) copper cylindrical rain gauge.
Since 1999, when the met station was automated, rainfall has been measured by an electronic tipping bucket rain gauge of 25.4cm diameter, calibrated to tip at 0.2mm (Campbell Scientific, ARG100). </p>

<p><B> Brooms Barn: </B> Rainfall (<B>RAIN</B>) was originally measured manually using a 5" (12.7cm) copper cylindrical rain gauge.
Since 2004, when the met station was automated, rainfall has been measured by an electronic tipping bucket rain gauge of 25.4cm diameter, calibrated to tip at 0.2mm (Campbell Scientific, ARG100). </p>

<A NAME="SEC2"></a>
<h2>Percolation (drainage)</h2>
<p><B>Measured at Rothamsted only: </B>

Three drain gauges (20, 40 and 60 inches) were constructed at Rothamsted in 1870. They consist of undisturbed blocks of
 soil 20, 40 and 60 inches (51,102 and 152 cm, respectively) deep and are equal in area to the rain gauge of 1/1000th of an acre.</p>

<p>The gauges were constructed by digging under and around the block of soil, placing perforated plates underneath at the required
 depth and bricking up the sides. The soil around the gauges remained undisturbed throughout the construction process. Drain water 
was originally measured by weighing the carboys of collected water (as for 1/1000th of an acre rainfall above), but these too were
 replaced by calibrated cylinders. In 2004 those were replaced by the electronic tipping bucket rain gauge. Percolation is the total
 over the previous 24 hours, recorded at 0900GMT. All three drain gauges remain as originally built. The soil has never been deep
 cultivated or cropped and the top is kept clear by hand weeding. </p> 

<A NAME="SEC3"></a>
<h2>Temperature</h2>

<p>Daily temperature is measured over the 24 hour period 0900 to 0900GMT; this is used for the previous day's maximum <b>(TMAX)</b> and the current day's minimum temperature<B> (TMIN)</B>. All other temperatures are recorded at 0900GMT. Until 1970 all temperatures were measured in �F; since 1972 they have been recorded in �C. All temperatures in e-RA are displayed as �C. </p>

<p><B>Rothamsted:</b></p>
<p><b> Air temperatures: </b></B> Maximum <B>(TMAX)</B> and minimum <b> (TMIN) </b> air temperatures were first recorded in 1878. <B>TMAX</B> was recorded using a mercury column
 thermometer and <b>TMIN </b>using a spirit-in-glass with indicator bar minimum thermometer. In 1915 dry <B>(DRYB)</B> and wet <B>(WETB)</B> bulb mercury column thermometers were introduced to record air temperatures
 and calculate variables such as relative humidity, vapour pressure and dew point. <b>GRSMIN</b>, the minimum temperature on grass, was first 
recorded in 1909 using a spirit-in-glass with indicator bar minimum thermometer. </p>  
<p>On 15th January 2014 <B>WETB </B>was discontinued and replaced by a Relative Humidity Sensor (Campbell Scientific, MP100A) to measure relative humidity <B>(RELH) </B>and from which vapour pressure <B>(VAP)</B> and dew point <B>(DEWP)</B> are now calculated after the method of Buck (1981). </p>

<p><B>Soil temperatures</B> are recorded at 0900GMT. They were first recorded in the 1930's using specially adapted thermometers. These were set at depths of 4, 8, 12, 24 and 48 inches (10, 20, 30, 61, and
 122 cm) under grass cover <B>(G10T, G20T, G30T, E30T, E50T and E100T) </B>and 4, 8 and 12 inches (10, 20 and 30 cm) under bare soil
<B> (S10T, S20T and S30T)</B>.  <B>G10T, G20T, G30T, S10T and S20T </B>were in direct contact with the soil; G30T was discontinued in 1997. 
The thermometers used to measure <B> E30T, E50T, E100T and S30T</B> were encased in a glass sheath in a metal tube, so that they could
 easily be removed to read the temperature. The bulb was set in paraffin wax to minimize rapid temperature fluctuations when the
 thermometer was removed from the soil.</P>
<P>  
Since 2004, all temperatures (air and soil) have been recorded by thermistors (electronic temperature probes, Campbell Scientific, type 107). For measuring soil 
temperatures, these are buried in the soil at the appropriate depth.</p>

<p><B> Woburn:</b></p>
<p><b> Air temperatures: </b></B>Maximum <B> (TMAX)</B> and minimum <B> (TMIN)</B> temperatures were first recorded in 1928 using mercury column
 thermometers. Dry <B>(DRYB)</B> and wet<B> (WETB)</B> bulb mercury column thermometers were used to record air temperatures and 
calculate variables such as relative humidity, vapour pressure and dew point.</P>
<p>On 1st December 2009 <B>WETB </B>was discontinued and replaced by a Relative Humidity Sensor (Campbell Scientific, MP100A) to measure relative humidity <B>(RELH) </B>
and from which vapour pressure <B>(VAP)</B> and dew point <B>(DEWP)</B> are now calculated after the method of Lowe (1977). </p>

<P><B>Soil temperatures</B> were first recorded in 1928 using specially adapted thermometers. These were set at depths of 1 and 4 feet (approx. 30 and 100 cm) 
under grass cover. 30 cm is shown as <B>E30T</b>, 1928-1970, 1988 onwards, <b>G30T</b>, 1971-1987; 100cm is shown as <b>E100T</b>, 1928-1967, 1971 onwards, <b> E122T</b>, 1968-1970.
From 1968, soil temperatures were also measured at 2 feet (approx.50cm) under grass cover. This is shown as <B>E50T</b>, 1971 onwards, <b>E60T</b>, 1968-1970. 
Soil temperatures under bare soil were measured at 4 and 8 inches (10 and 20 cm, <B>S10T and S20T</B>). </p>

<A NAME="SEC4"></a>
<h2>Sunshine hours</h2>

<P><B>Rothamsted:</B> Sunshine readings (hours of bright sunshine,<B> SUN)</B> over a 24 hour period 00.00-24.00 hrs GMT were first recorded in 1892 using a Campbell-Stokes sunshine 
recorder. The sun's rays are focused onto a card (treated to prevent it from catching fire) and the brown scorch mark on the card is 
then measured. The cards are of varying lengths applicable to the time of year (winter, equinox, and summer). Since 2004 sunshine has
been calculated using the Campbell-Stokes equation from solar radiation measured using a Kipp and Zonen thermopile pyranometer. </p>

<P>The maximum temperature in the sun, <B>SUNMAX</B>, was recorded between 1915 and 1935 using a black bulb in vacuo. </p>

<p><B>Woburn:</B> Since 1999 sunshine (hours of bright sunshine,<B> SUN)</B> has been calculated using the Campbell-Stokes equation
from solar radiation measurements using a Kipp and Zonen thermopile pyranometer. Previously it was measured with a sunshine recorder. </p>


<A NAME="SEC5"></a>
<h2>Solar Radiation</h2>

<p><B>Rothamsted: </B> Total solar radiation <B>(RAD)</B> over 24-hour periods 00.00-24.00 hrs GMT. Measurements have been made since 1921, but the earliest recorded data in
e-RA are from 1931. There were several gaps between 1921 and 1923, probably due to equipment malfunction, so these early data have little value. From 1921-1930, radiation was
calculated in calories/cm<sup>2</sup> but from January 1931, radiation was expressed in Joules/cm<sup>2</sup>, and these are the data that have been included in e-RA. 
Penman (1974, see key references below) stated that 'Apart from periods for instrument repairs, solar radiation has been recorded daily at
Rothamsted since October 1921. The first instrument was a Callendar recorder, purchased by the Plant Physiology Department of Imperial College in 1916, and run at Rothamsted for 
the Department from 1921.  In 1943 Professor Blackman asked Rothamsted to take over the instrument and be responsible for all future repairs and replacements. Right up to 1954 
there was great uncertainty about the sensitivity, and as the original supplier had ceased to make them the replacement then sought had to be found elsewhere: Over the first 
30 years the readings were probably accurate enough for the use that could be made of them at the time � (but are not good enough for present needs) �  In 1955 a Moll-type solarimeter 
(Kipp) was installed with a paper chart recording potentiometer. As before, daily totals were obtained by planimeter integration - a tedious and awkward task - until in 1958 an automatic integrator was added with a digital counter set to register directly in cal/cm<sup>2</sup> ' (Rothamsted Weather, Rothamsted Report for 1973, Part 2, 172 - 201).   </p>
<p>Radiation figures between 1947 and 1954 were noted by Monteith to be 20% higher than would be expected (and the same probably applies to earlier data). 
Thus, data from before 1955 should be treated with some caution. A Kipp integrator and recorder was in use from 13th November 1975. A (new) Kipp and Zonen integrator was installed in 1989. In 2004 this was replaced by a Kipp and Zonen thermopile
pyranometer. </p>

<p> Data from Rothamsted are recorded as J/cm<sup>2</sup>. To convert to MJ/m<sup>2</sup> divide by 100. To convert MJ/m<sup>2</sup> to W/m<sup>2</sup> multiply by 11.6. </p>

<p><B>Woburn: </B>At Woburn solar radiation <B>(RAD)</B> is measured using a pyranometer (Kipp and Zonen, CM6B), and are recorded as MJ/m<sup>2</sup>.</p>


<A NAME="SEC6"></a>
<h2>Wind</h2>


<p><B>Rothamsted:</B> Wind direction<B> (WDIR) </B>has been measured since 1853. Wind direction is shown in e-RA as an angle, going clockwise from North. 360 = North, 90 = East, 180 = South, 
270 = West. The reading 0 (or 000) indicates that there is no wind, ie the windspeed is 0 m/s. A WDIR reading of 0 with a windspeed greater than 0 implies that the WDIR is 
360 degrees (North). 
</p><p>Wind speed was originally estimated using the Beaufort scale. It is shown in e-RA as wind 
force<B> (WFORCE) </B>from 1915 to 1959. From 1960 onwards it is shown as wind speed <B>(WINDSP)</B> converted from knots to m/s (1 knot = 0.514 m/s). </p>

<p>The Beaufort scale can be adjusted to wind speed using the following equation:</p>

<p>V = 1.624 x SQRT (B<sup>3</sup>) </p>

<p>Where V = wind speed in knots, B = Beaufort scale (1 knot = 0.514 m/s) (Met Office 1982).  </p>

<p>Wind direction <B> (WDIR) </B> and wind speed <B>(WINDSP) </B> were then measured by wind vane and a cup anemeometer linked to a Munro roll chart recorder (model IM175) 
installed in 1978. From 2004 an electronic wind vane (Vector Instruments, W200P) and cup anemometer (Vector Instruments, A100LK/2) were installed at a height of 12.8m above 
ground level. The standard height for surface wind measurements over open and level terrain is 10m. However, no correction is needed for wind speeds measured between 8 and 
13m (Met Office, 1982). We therefore assume a mid-point height of 10m. From 2004 wind direction and speed are calculated as an average over 10 minutes from 8.50 to 9am</p>

<p>Measurements of wind run <B>(WINDRUN)</B> are available from 1946 onwards, first measured using a cup anemometer with a calibrated meter installed at a height of 2m. From 2004 to January 2014 wind run has been measured using an electronic cup anemometer (see above). The cup anemometer was at a height of 12.8m.  This was then corrected to 2m by multiplying by 0.78:</p>

<p>Vh/V10 = 0.233+0.656*log10 (h+4.75), where Vh = speed in knots at height h, V10 = speed at 10m and h = height in m
(Met Office 1982). </p>
<p> Since February 1st 2014 a second cup anemometer (Vector Instruments A100LK) installed at a height of 2m has been used to measure wind run, so no adjustment for height is now required. </p>


<p><B>Woburn:</B> Wind speed was originally estimated using the Beaufort scale. It is shown in e-RA as wind force <B>(WFORCE)</B> from 1928 to 1967. From 1968 onwards it is shown as wind speed <B>(WINDSP)</B> converted from knots to m/s. </p>

<p>The Beaufort scale can be adjusted to wind speed using the following equation:</p>

<p>V = 1.624 x SQRT (B<sup>3</sup>) </p>

<p>Where V = wind speed in knots, B = Beaufort scale (1 knot = 0.514 m/s). (Met Office 1982).</p>

<p>From 01/07/1999 onwards wind speed has been measured using an automated cup anemometer at 2m height. This sensor was replaced in July 2008 with a new cup anemometer (Vector Instruments, A100LK). The values in e-RA have been adjusted to the standard height of 10m (Met Office, 1982).</p>

<p>Wind run <B>(WINDRUN)</B> was first measured using a cup anemometer installed at 2m with a calibrated meter. Since July 1999 it has been measured by a cup anemometer at 2m, the same instrument used for measuring wind speed (see above). </p>

<p>Wind Direction<B> (WDIR)</B> was estimated from a wind vane with fixed ordinal points. In 1999 this method was replaced by an electronic wind vane ( Vector Instruments, W200P).</p>

<p><B>Brooms Barn:</B> Windspeed is measured at 2m and adjusted to the standard height of 10m by multiplying by 1.28. Between 24th May 2012 and 11th December 2012, windspeed was a 10 minute average, recorded between 8.50 and 9.00am. Since 2013 it has been a point value recorded at 9.00am.</p>

<p>The Brooms Barn meteorological station is approx. 30m from the main buildings, which are approx. 10m high. This may cause some interference with the measurement of wind speed and wind direction, as ideally a mast with wind sensors should be a minimum of 10 times the height of the nearest building away from the nearest building (ie at least 100m apart). This gives enough fetch for the wind to settle down.  The met station and main building have always been in these positions. 
</p>

<A NAME="SEC7"></a>
<h2>Evaporation</h2>

<p><B>Rothamsted:</B> In 1924, a brick-lined pit 8ft (2.44m) and 20ft (6.1m), surrounded by 12 cylinders set in the soil was built 
at the Rothamsted meteorological enclosure. The cylinders were 6ft (1.83m) deep and 2ft 6in. (0.76m) in diameter and made
of cast iron lined with a 1/2in. layer of bitumen painted concrete; the bottom of the cylinders sloped down to an outlet pipe accessible
from the pit. Five of the cylinders were filled with a sandy loam from Woburn, the soil texture being uniform throughout.  
Three of the soil cylinders had turf laid on top of the soil; the other soil surfaces were kept bare. The soil was left to settle
and weather for 16 years.  Ten cylinders were joined up in pairs at the outlets, each soil cylinder being connected to an unfilled
cylinder, so forming a set of U tubes. Waterproof covers were provided for the unfilled cylinders (minors) to prevent entry of rain
and to reduce evaporation losses to negligible amounts. The minors were filled with water until the soil or turf surfaces were 
flooded, then water was run out until the water-table had reached a pre-determined depth below the surface. One of the minors was 
filled to near the brim and the level kept at 1 in. below the surface and this was selected as the open water standard. For further
details refer to Penman (1948).</p>  

<p> A standard meteorological Office evaporation tank was installed in 1945. The galvanized iron tank measured 2ft 6in (0.76m)
in diameter and was 2ft (0.61m) deep. The water level was kept at or near ground level, leaving a projecting rim of 3in (7.62 cm). 
The level was read daily with a hook gauge reading to 1/100 in., and topped or drained as necessary. </p>

<p>Evaporation measurements ceased in 1974 and values were instead derived from wet and dry bulb temperatures 
(see <a href="Met/derived variables">Derived Variables</a>). </p>

<A NAME="SEC8"></a>
<h2>Relative Humidity</h2>

<p>Relative Humidity <b>RELH</b> was originally derived from wet and dry bulb temperatures. A Relative Humidity Sensor (MP100A, made by Rotronics, supplied by Campbell Scientific) replaced the wet bulb sensor at Woburn and Brooms Barn in 2009 and at Rothamsted in 2013.  The MP100A was replaced by an EE181 E+E RH probe, which is made by E+E Elektronic Corporation, supplied by Campbell Scientific, at Brooms Barn on April 25th, Woburn on July 3rd and Harpenden on August 7th 2018.</p> 


<A NAME="SEC9"></a>
<h2>Vapour pressure</h2>

<p><B>Rothamsted:</B> Vapour pressure <B>(VAP)</B> was calculated from 1946 to January 2014 from Wet Bulb (WETB) and Dry Bulb (DRYB) temperature (see <a href="Met/derived variables#VAP">Derived Variables</a>).
This is calculated in kPa and converted to mb in the e-RA output. mb=kPa x 10. </p>

<p>On 15th January 2014 <B>WETB </B>was discontinued and replaced by a Relative Humidity Sensor (Campbell Scientific, MP100A) to measure relative humidity <B>(RELH) </B>. 
From January 15th 2014 onwards Vapour Pressure has been calculated within the datalogger from Relative Humidity and Dry Bulb temperature after Buck (1981 - see <a href="Met/derived variables#VAP">Derived Variables</a>). </p>


<p><B>Woburn:</B> Vapour pressure <B>(VAP)</B> was calculated from July 1999 to November 2009 from Wet Bulb (WETB) and
Dry Bulb (DRYB) temperature (see <a href="Met/derived variables#VAP">Derived Variables</a>).
This is calculated in kPa and converted to mb in the e-RA output. mb=kPa x 10. </p>
<p>There were problems with the Wet Bulb thermometer drying out, and data from the end of 2009 was unreliable.
In December 2009 a Relative Humidity sensor was fitted (Campbell Scientific, MP100A) to the datalogger and the Wet Bulb thermometer discontinued.
From December 2009 onwards Vapour Pressure has been calculated within the datalogger from Relative Humidity and Dry
Bulb temperature after Lowe (1977 - see <a href="Met/derived variables#VAP">Derived Variables</a>). </p>

<A NAME="SEC10"></a>
<h2>Barometric pressure</h2>
<p><b>Rothamsted:</b>
Atmospheric pressure was measured with a mercury barometer from 1915 to 2003 <b>(BAR)</b>. A thermometer attached to the
instrument casing (known as the attached thermometer, <b>THERM</b>) was used to measure the temperature of the mercury column 
from which the density of the mercury was established.  Pressure corrected to mean sea level <b>(BAR_MSL)</b> is also available 
from 1950 to 1977.</p>
<p><b>Woburn:</b>
A mercury barometer was used to measure atmospheric pressure from 1928 to 1970, and 1988-1999 <b>(BAR)</b>. A thermometer attached
 to the instrument casing (known as the attached thermometer, <b>THERM</b>) was used to measure the temperature of the mercury 
 column from which the density of the mercury was established. Pressure corrected to mean sea level <b>(BAR_MSL)</b> is also 
 available from 1928 to 1967. </p> 
 <p>For further details of measurement of barometric pressure see Met Office (1982) page 103.</p>

<A NAME="SEC11"></a>
<h2>Other variables</h2>

<p><b>Visual measurements</b> of cloud cover, state of the ground's surface, visibility, current weather, etc were collected daily and
entered into a diary. The codes used are based on Meteorological Office Standard weather codes. Visual measurements ceased to be made at 
Woburn in 1999 and at Rothamsted in May 2007. For full details for the various codes used, please contact the <a href= "mailto:era@rothamsted.ac.uk"> e-RA Curators</a></p>

<p>Cloud cover <b>CLOUD</b> is recorded in Oktas, on a scale of 0 to 9. 0 represents clear sky, 8 complete cloud cover with 9 representing fog. </p>


<p>Other variables were recorded onto Meteorological Office return sheets as extra columns. Evaporation, vapour pressure, dew point and
potential soil moisture deficit are derived from wet and dry bulb temperatures (see <a href="Met/derived variables#VAP">Derived Variables</a>). 
</p>



<A NAME="SEC12"></a>


<p>Compiled by Claudia Underwood, Tony Scott and Margaret Glendining, Rothamsted, 2010, updated 2017.
With thanks to Tony Scott for the Rothamsted Met Station images, and John Jenkyn for information about radiation measurements at Rothamsted. </p>

<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}     ?>


