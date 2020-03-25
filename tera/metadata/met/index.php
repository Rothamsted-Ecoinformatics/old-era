<?php
$KeyRef = "KeyRefMetdata" ;

?>


<h1>Meteorological Data stored in e-RA</h1>

<p>
Daily meteorological data recorded at three of the Rothamsted Research sites, Rothamsted, Woburn and Brooms Barn, is available from e-RA. Hourly data for Rothamsted and Woburn from 2004 is available 
from the <a href= "mailto:era@rothamsted.ac.uk"> e-RA Curators.</a> Monthly summary data for <a href="Met/SaxMet1966">Saxmundham</a> 1966-1985 is available as an Open Access dataset.  </p>


<p>Location of the meteorological sites:<p />
<p class="center">
<table class="center">
<tr>
<th class="border" > <b> Site </b></th>
<th class="border" > <b> Location</b> </th>
<th class="border" ><b> OS Grid Ref </b></th>
<th class="border" ><b> Latitude</b></th>
<th class="border" ><b>Longitude</b></th>
<th class="border" ><b>Altitude (m asl)</b></th>
</tr>
<tr>
<td class="border" > <a href="Met/rothmet">Rothamsted</a></td>
<td class="border" > Harpenden, Hertfordshire, AL5 2JQ</td>
<td class="border" > TL 13154 13272 </td>
<td class="border" > 51.8066 N</td>
<td class="border" > -0.3602 E</td>
<td class="border" > 128 </td>
</tr>
<tr>
<td class="border" ><a href="Met/wobmet">Woburn Experimental Farm</a></td>
<td class="border" >Mill Road, Husborne Crawley, Bedfordshire, MK43 OXF</td>
<td class="border" > SP 96440 36047 </td>
<td class="border" > 52.0145 N</td>
<td class="border" > -0.5962 E</td>
<td class="border" > 89 </td>
</tr>

<tr>
<td class="border" > <a href="Met/broomet">Brooms Barn</a></td>
<td class="border" > Higham, Bury St. Edmunds, Suffolk, IP28 6NP</td>
<td class="border" > TL 75195 65582 </td>
<td class="border" > 52.2605 N</td>
<td class="border" > 0.5656 E</td>
<td class="border" > 70 </td>
</tr>

<tr>
<td class="border" > <a href="Met/SaxMet1966">Saxmundham Experimental Station</a></td>
<td class="border" > Saxmundham, Suffolk</td>
<td class="border" > TM 36837 63750  </td>
<td class="border" > 52.221 N</td>
<td class="border" > 1.466 E</td>
<td class="border" > 37 </td>
</tr>
</table>

</p>
<p>
</p>
<ul>
<li><A href="<?php echo $request; ?>#SEC1">Important Alerts</A> including met data corrections. PLEASE READ FIRST </li>
<li><A href="Met/monthly">Met Data Monthly and Annual Summaries</A> </li>
<li><A href="<?php echo $request; ?>#SEC2">Background</A> </li>
<li><A href="<?php echo $request; ?>#SEC3">Data Available (including data previews), daily and hourly data, and Data Extraction Tool</A></li>
<li><a href="Met/met_open_access">Open Access:</a> Freely available Rothamsted met data</li>
<li><a href="Met/extremes">Extremes</a> Extreme weather events at Rothamsted</li>
<li><a href="Met/30-year-mean-charts">30-year means</a> 30-year weather means at Rothamsted</li>
<li><a href="http://resources.rothamsted.ac.uk/rothamsted-highs-and-lows" target="_blank">Rothamsted Highs and Lows</a> The highest and lowest monthly mean values and year recorded.</li>
<li><a href="<?php echo $request; ?>#SEC6">Links</a> related to Met data </li>
<li class="nicelist"><a href="<?php echo $request; ?>#papers">Key References</a> related to Met Data</li>
<li><a href="<?php echo $request; ?>#SEC4">Atmospheric inputs:</a> chemical inputs in rain and dry deposition</li>
<li><a href="Met/instrumentdescription">Measurement of variables</a></li>
<li><a href="Met/derived_variables">Calculation of Derived Variables</a></li>
<li><a href="Met/metsoils">Soils:</a> information about the site, soil type, texture and soil weight </li>
<li><a href="<?php echo $request; ?>#SEC5">History</a> of measurement of Met data at Rothamsted</li>
</ul>

<A NAME="SEC1"></a>
<h2>IMPORTANT ALERTS</h2>
<ul>
<li><a href="Met/importantmeteorologicaldataupdates"> Met data corrections:</a> please read <b> before </b> downloading met data</li>
</ul>
<p><b>Disruption to services - 20 June to 19 July 2019:</b> Rothamsted Weather Station (Harpenden) underwent an upgrade and annual maintenance during this period. All the missing data has now been loaded, 
except the 1/1000th acre rain gauge (RAINL, 20/06/2019 - 01/07/2019) and the drain gauge data (DR20, DR40 and DR60, 20/06/2019 - 11/07/2019), which was lost. Rain duration data (RDUR) was also lost
in days when it rained between 20/06/2019 and 12/09/2019.
</p>

<p><b>Woburn Met Data, June 7th - July 20th 2016:</b> Electric storms on 7th June caused considerable damage to the Woburn data logger,
and we were unable to collect the weather data at Woburn until a new data logger was installed. Missing data has now been entered from the 
Met Office (see under Woburn below). There are still some data missing for some variables as follows:</p>
<ul>
  <li>S20t: 08/06/2016 - 20/07/2016</li>
  <li>sun hr: 07/06/2016 - 19/07/2016</li>
  <li>wind dir &amp; windsp: 17/06/2016 - 20/07/2016</li>
  <li>wind run: 16/06/2016 - 19/07/2016</li>
</ul>
<!--
COMMENTED OUT:
<p><b>RAIN: Change of rain gauge and the effect on rainfall capture.</b> Rainfall until 2004 was measured manually 
using a 5" copper cylindrical rain gauge. In 2004 the Met Stations at Rothamsted and Woburn were automated and 
the 5" rain gauges replaced by an ARG100 tipping bucket rain gauge of diameter 10". The manufacturers of the ARG100 state 
that the "ARG100 rain gauge typically captures over 5% more rainfall than most traditionally-shaped cylindrical gauges
due to its unique aerodynamic shape and reduced evaporation-loss properties". This has been found to be the case at 
Rothamsted. When we have compared the ARG100 with the 5" within the turf-wall enclosure we get a difference of approx. 10%
over an 8 year period (2004 to 2011). This value however does change on a year to year basis. 
A study to model rainfall data is being carried out to provide adjusted data. Once this is completed, adjusted rainfall
values will be available from the e-RA curators. This applies to the variable RAIN in the Rothmet and Wobmet datasets. 
</p> -->

<p><b>Missing data supplied by the Met Office:</b>The following variables were supplied by the Met Office, when our AWS (Automatic Weather Stations) were not fully functional:</p>
<p><b>Woburn:</b> </p>
<ul>
<li class="nicelist">01/07/2009 - 08/10/2009: RAIN &copy; Crown Copyright Met Office 2009</li>
  <li class="nicelist">18/07/2013 - 26/07/2013 and 09/10/2013 - 11/10/2013: ALL VARIABLES &copy; Crown Copyright Met Office 2013</li>
<li class="nicelist">20/06/2015 - 28/06/2015: RAIN &copy; Crown Copyright Met Office 2015</li>
<li class="nicelist">07/06/2015 &ndash; 20/07/2016: RAD &copy; Crown Copyright Met  Office 2016</li>
<li class="nicelist">16/06/2016 &ndash; 20/07/2016: RAIN &copy; Crown Copyright Met  Office 2016</li>
</ul>

<p><b>Brooms Barn:</b> </p>
<ul>
  <li class="nicelist">01/08/2009 - 31/05/2012: TMAX; TMIN; DRYB; RAIN &copy; Crown Copyright Met Office 2009, 2010, 2011, 2012 </li>
  <li class="nicelist">01/10/2014 - 03/11/2014: RAIN &copy; Crown Copyright Met Office 2014</li>  
  <li class="nicelist">16-17/08/2016: TMAX; TMIN; DRYB; GRSMIN; S10T; E30T; RELH &copy; Crown Copyright Met Office 2016</li>
  <li class="nicelist">30/10/2016-03/11/2016: TMAX; TMIN; DRYB; RELH &copy; Crown Copyright Met Office 2016</li>
  <li class="nicelist">09/11/2016: RAIN &copy; Crown Copyright Met Office 2016</li>
  <li class="nicelist">18/04/2018-25/04/2018 (except 19/04/2018): TMAX, TMIN, RAIN, RELH, DRYB, S10T, G30T 
 &copy; Crown Copyright Met Office 2018</li>
</ul>
<p>The Brooms Barn meteorological station is approx. 30m from the main buildings, which are approx. 10m high. This may cause some interference with the measurement of wind speed and wind direction, as ideally a mast with wind sensors should be a minimum of 10 times the height of the nearest building away from the nearest building (ie at least 100m apart). This gives enough fetch for the wind to settle down.  The met station and main building have always been in these positions. </p>

<A NAME="SEC2"></a>
<h2>Background</h2>

<p><B>Rothamsted</B> has one of the longest continuous sets of meteorological recordings in the world. Total 
rainfall and wind direction have been measured since 1853, temperature since 1878, sunshine from 1890, wind force from 
1917, radiation from 1931, wind run since 1946 and wind speed since 1960. Annual rainfall averages 704mm (1971-2000), but ranges widely 
from 380mm in 1921 to 973mm in 2000. Mean annual temperature 1878-1990 at Rothamsted was 9ºC; average annual temperature is now more 
than 1ºC higher than the 1878-1990 average (for more details refer to Guide to Classical Experiments 2006, p 44-45). Since January 1st 2004,
meteorological records have been measured by a range of sensors attached to an automatic data logger; some manual observations continued to
be made until May 2007. </p>

<p>Rothamsted took over the management of the farm at <B>Woburn</B> in the 1920's and the first meteorological records date back to 1928.  
Annual rainfall averages 649mm (1971-2000). Temperature, rainfall, sunshine, wind force and wind direction have been measured since 
1928. Wind speed and wind run have been measured since 1968 and radiation measurements started in 1981.  Manual observations ceased on
1st July 1999, and meteorological records are now measured by a range of sensors attached to an automatic data logger.  The mean annual 
temperature (1971-2000) was 9.6 ºC.  </p>

<p>Meteorological data was first collected in <B>Brooms Barn</B> in 1963. Fewer variables are measured than at Rothamsted and Woburn. Rainfall 
averages 612mm (1963-2008). Mean annual temperature 1964-2008 was 9.9°C. Dew point, wind run, sunshine hours, vapour pressure and relative humidity have also been measured and/or calculated. Data from 1982 is available in e-RA. </p>
<p>The Brooms Barn meteorological station is approx. 30m from the main buildings, which are approx. 10m high. This may cause some interference with the measurement of wind speed and wind direction, as ideally a mast with wind sensors should be a minimum of 10 times the height of the nearest building away from the nearest building (ie at least 100m apart). This gives enough fetch for the wind to settle down.  The met station and main building have always been in these positions. </p>

<p><A NAME="SEC3"></a></p>
<h2>Data Available</h2>
<p>The following sets of daily data can be extracted using the <a href="<?=$det?>" target="out">e-RA Data Extraction Tool</a>. Preview sets of data are also available</p>

<UL>
<LI class="nicelist"><B><a href="Met/rothmet">Rothmet</a>:</B>  Rothamsted daily meteorological records 1853-present 
<a href="<?php echo $metadata; ?>ROTHMETexample.xlsx"> <B>Preview Data</b></a></li>
<LI class="nicelist"><B><a href="Met/wobmet">Wobmet</a>:</B>   Woburn daily meteorological records 1928-present 
<a href="<?php echo $metadata; ?>WOBMETexample.xlsx"> <B>Preview Data</b></a></li></li>
<LI class="nicelist"><B><a href="Met/broomet">Broomet</a>:</B>  Brooms Barn daily meteorological records 1982-present 
<a href="<?php echo $metadata; ?>BROOMETexample.xlsx"> <B>Preview Data</b></a></li></li></li>
<LI class="nicelist"><B><a href="Met/RMMRAIN5318">RMMRAIN5318</a>:</B>  Mean Monthly Rainfall at Rothamsted March 1853 - July 2018 
</li></li></li>
<LI class="nicelist"><B><a href="Met/SaxMet1966">SaxMet1966</a>:</B>  Monthly meteorological data summaries at Saxmundham 1966-1985 
</li></li></li>
</UL>
<p>The following <a href="Met/derived_variables" target="_blank"><strong>Derived Variables</strong></a> are now, as of September 2017, available directly from the <a href="<?=$det?>" target="_blank">Data Extract Tool</a>: 
<p>Potential Soil Moisture Deficit (PSMD)<br />
  Accumulated Day Degrees Above (DDA) a given temperature<br />
  Accumulated Day Degrees Below (DDB) a given temperature<br />
  Evaporation Over Grass (EVAPG)<br />
  Evaporation Over Water (EVAPW)<br />
  Vapour Pressure (VAP)<br />
  Relative Humidity (RELH)<br />
  Dew Point (DEWP) </p>
<p>NOTE: To get the full benefit of this calculated variables feature use either Google CHROME or FrontMotion Firefox.</p>

<p><b>Hourly data</b> for Rothamsted and Woburn (from 2004) and Brooms Barn (all data from 2016, radiation only from 2003) is available from the <a href= "mailto:era@rothamsted.ac.uk"target="_blank"> e-RA Curators. 
See <a href="<?php echo $metadata; ?>List of hourly variables recorded at RRes Weather Stations.pdf"> <B>Data available</b></a> for list of all hourly variables available at each of the three sites. 
<p><b>Real-time hourly, daily and yearly weather charts</b> for Rothamsted, Woburn and Brooms Barn are available on-line over 28 days or 365 days 
(rolling) via the <a href="http://resources.rothamsted.ac.uk/environmental-change-network/rothamsted-weather-charts"target="_blank"> Rothamsted Environmental Change Network (ECN) pages.</a> 

<p>The ECN have a citeable <a href="https://doi.org/10.5285/fc9bcd1c-e3fc-4c5a-b569-2fe62d40f2f5" target="_blank"><strong>hourly meteorological dataset, 1991-2015</strong></a> which includes Rothamsted and North Wyke data, along with the other ECN UK terrestrial sites. </p> 

<p><strong>Yearly and Monthly summaries</strong> of Rothamsted meteorological data are avilable from the <a href="http://resources.rothamsted.ac.uk/environmental-change-network/yearly-weather-summaries" target="_blank">ECN at Rothamsted</a>. 

<p><A NAME="SEC4"></a>
<H2>Atmospheric inputs</H2>
<p><B> Chemical inputs in rain and dry deposition</B> 
Since the 1850s, chemical inputs in rain at Rothamsted have changed considerably. Inputs of acidity (H+ ions) are small; less than
0.1 kg ha<sup>-1</sup>yr<sup>-1</sup>    up to the 1950s. They reached a maximum of 0.4 kg ha<sup>-1</sup>yr<sup>-1</sup> in the 1970s and are 
now about 0.2 kg ha<sup>-1</sup>yr<sup>-1</sup>. 
In contrast, other inputs, such as sulphate, nitrate or ammonium can be much larger. 
Inputs of sulphate-S were about 5 kg ha<sup>-1</sup>yr<sup>-1</sup> in the 1850s, reached a maximum of 65
kg ha<sup>-1</sup>yr<sup>-1</sup> by 1980. After a dramatic decline, associated with decreasing emissions from power stations and a decline in
heavy industry, they are now about 5 kg ha<sup>-1</sup>yr<sup>-1</sup>.
Inputs of nitrate- and ammonium-N in rainfall were 1 and 3 kg ha<sup>-1</sup>yr<sup>-1</sup>, respectively, in 1855, and increased to 8 and 10 kg ha<sup>-1</sup>yr<sup>-1</sup> in 1980. 
In 1996, N in dry deposition amounted to 34 kg N ha<sup>-1</sup>yr<sup>-1</sup>; about three times that in rainfall. The total N input, for wet and
dry deposition at that time was about 43 kg N ha<sup>-1</sup>yr<sup>-1</sup>, which agreed well with other estimates; calculated total inputs ranged from 30-50 kg N
ha<sup>-1</sup>yr<sup>-1</sup> during the late 20th century. Since then, atmospheric inputs have declined to about 21 kg N ha<sup>-1</sup>yr<sup>-1</sup> (Storkey <i>et al</i>, 2015; David <i>et al</i>, 2019), compared 
with about 10 kg ha<sup>-1</sup>yr<sup>-1</sup> in the mid-1850s.
</p>
<p>Concentrations of <B>carbon dioxide</B> (CO<sub>2</sub>) are not measured at Rothamsted but the rise in atmospheric CO<sub>2</sub> concentrations worldwide has been well
documented; increasing from about 280 ppm in 1850 to c.400 ppm in 2015. </p>
<p>See Goulding et al (1986) for details of atmospheric deposition at Rothamsted, Woburn and Saxmundham, 1969-1984.</p>


<A NAME="SEC5"></a>
<h2>History of the measurement of met data at Rothamsted</h2>

<p>Thomas Wilson of Rivers Lodge was recording weather from at least 1873. In August 1876, he offered to 'keep a Meteorological register' for the Met. 
Office. There is, as far as we know, a continuous record from then until 1899. He undoubtedly submitted the vast majority of these returns but as he often 
failed to sign them it is possible that someone else (most likely Edwin Grey) was responsible for some of the later ones; the last one that Wilson signed was, 
we think, that for January 1897. The Rothamsted Archive has Wilson's original records (MET3.1) because he asked the Met. Office to return them after copying the figures. 
He inconsistently gave the location as Harpenden, Harpenden Common or Rivers Lodge but never (or, perhaps, very seldom) wrote Rothamsted.     </p>
<p>Wilson made various observations (at Rivers Lodge) including temperature but his rainfall figures are from Rothamsted (i.e. the Barnfield site). This is not always 
specified but there are more than enough references to the fact to leave no doubt that this was invariably true.  </p>
<p>Data from the Rothamsted rain and drain gauges are in MET2.2. From January 1878, the tables also record minimum and maximum temperatures, which are from Rivers Lodge. 
Again this is not always specified but it is indicated sufficiently frequently to be sure that it was invariably so. We checked figures for November 1884 in the two documents (
i.e. Wilson's return to the Met. Office and the Rothamsted rain and drain gauge tables) and confirmed that, for both rainfall and temperature, they are identical. It is 
likely that the temperature data in e-RA were copied from MET2.2 because both start on 1st January 1878; if the source was Wilson's original returns, the transcriber(s) 
would have been aware that the records started in August 1876.   </p>
<p>There is potential to extend back by seventeen months the daily maximum and minimum temperatures in e-RA but it would be wise to first examine in more detail the 
correspondence in MET4.2, which is thought to make reference to the acquisition of a screen; it's possible that Wilson did not, at first, have a screen.  As Wilson's 
figures also include wet and dry bulb temperatures there is even greater scope to add to the humidity data in e-RA, which currently start in 1915.    </p>

<p>What happened after 1899 has not been established but nothing has been found to suggest that Wilson continued making returns to the Met. Office after that date. 
It is, however, almost certain that it was still Rivers Lodge data that were being submitted to them because Edwin Grey stated (in his 'Reminiscences'):  'The present 
collection of meteorological instruments now in use were obtained and set up in their present position by Sir Daniel Hall.  Before these were acquired we used the records 
of Mr. Wilson's private instruments, the thermometer screen being in the grounds of River's (sic) Lodge and the barometer in the hall'.  Hall came in 1902 and left in 1912 
so, assuming that 'the present collection of meteorological instruments' to which Grey refers was on the Barnfield Met. Site, they can't have been in use before 1902. MET5.5 
contains Edwin Grey's notebooks of 'Daily Meteorological Records' 1891-4 and, perhaps more significantly, 1897-1910; figures for the years up to 1902 can be assumed to be for 
Rivers Lodge even if that is not explicitly stated. We have found nothing to indicate when the Barnfield instruments were installed but, interestingly, there are in MET5.6, 
'River's (sic) Lodge meteorological records, 1910-27'. Thus the Rivers Lodge instruments were being read until at least 1927, thus implying that observations were for some 
years being made on both sites (i.e. Rivers Lodge and Barnfield).  It is, therefore, possible that, for some time after the new instruments had been installed on the Barnfield
site, it was still Rivers Lodge data that were being sent to the Met. Office.    </p>
<p> With thanks to John Jenkyn and Liz Allsopp who provided this background information, Jan 2018</p>


<A NAME="SEC6"></a>
<h2>Related Links</h2>

<UL>
<LI class="nicelist">
<A HREF="home/Web_LTE_Guidebook_2018_2019-reprint.pdf" target="_blank">
Rothamsted Guide to the Classical Experiments 2018</A> page 45.

<li class="nicelist"><a href="http://rothamsted.sharepoint.com/sites/MeteorologicalData/SitePages/Meteorological-Data.aspx" target="_blank">For Rothamsted internal users only, </a> Rothamsted summary tables, graphs, hourly data, etc. on sharepoint</li>
<li class="nicelist"><a href="http://www.ecn.ac.uk/" target="_blank">The UK Environmental Change Network (ECN)</a> monitoring, data and research to understand environmental change.</li>
<li class="nicelist"><a href="http://data.ecn.ac.uk/" target="_blank">The ECN Data Centre</a> manages the data for five UK monitoring networks.</li>
<li><a href="http://www.rothamsted.ac.uk/environmental-change-network" target="_blank">The Environmental Change Network (ECN) at Rothamsted</a> - Rothamsted is one of the twelve sites in the network.</li>
<li><a href="http://resources.rothamsted.ac.uk/environmental-change-network/rothamsted-weather-charts" target="_blank">Rothamsted ECN Weather Charts</a> -  daily, monthly, yearly charts from Rothamsted, Hertfordshire.</li>
<li><a href="http://resources.rothamsted.ac.uk/environmental-change-network/woburn-weather-charts" target="_blank">Woburn Weather Charts</a> - daily, monthly, yearly charts from Woburn, Bedfordshire.</li>
<li><a href="http://resources.rothamsted.ac.uk/brooms-barn-weather-charts" target="_blank">Brooms Barn Weather Charts</a> - daily, monthly, yearly charts from Brroms Barn, Suffolk.</li></ul>


<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div><a name="pixies"></a><div class="col-2">
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>MetStation.jpg"><img src="<?=$metadata?>/ty_MetStation.jpg" title="Met Station overview" width="100" /><br>
Rothamsted Met Station     </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>RothStevensonScreen.jpg"><img src="<?=$metadata?>/ty_RothStevensonScreen.jpg" title="Stevenson Screen" width="100" /><br>
Rothamsted Stevenson Screen    </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>InsideStevenson.jpg"><img src="<?=$metadata?>/ty_InsideStevenson.jpg" title="wet bulb,dry bulb,tmax,tmin " width="100" /><br>
Stevenson Screen thermometers      </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>RothGEtempprobes.jpg"><img src="<?=$metadata?>/ty_RothG&Etempprobes.jpg" title="Grass and earth temperature probes " width="100" /><br>
Temperature probes                     </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>Rothgrassmin.jpg"><img src="<?=$metadata?>/ty_Rothgrassmin.jpg" title="Grass min thermometer " width="100" /><br>
Grass min thermometer         </a>
</div>

<!--
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>stevenson.jpg"><img src="<?=$metadata?>/ty-stevenson.gif" title="Thermometers in Stevenson Screen" width="100" /><br>
Inside the Stevenson screen      </a>
</div>
-->
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>WindInstruments.jpg"><img src="<?=$metadata?>/ty_WindInstruments.jpg" title="10m tower" width="100" /><br>
Wind tower      </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>WindInstrumentscloseup.jpg"><img src="<?=$metadata?>/ty_WindInstrumentscloseup.jpg" title="Cup anemometer,wind vane, radiation pyranometer" width="100" /><br>
Wind and radiation instruments   </a>
</div>

<!--
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>anemometer.gif"><img src="<?=$metadata?>/ty-anemometer.gif" title="Windrun anemometer" width="100" /><br>
Windrun anemometer   </a>
</div>
-->

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>solar.gif"><img src="<?=$metadata?>/ty-solar.gif" title="Campbell-Stokes solar recorder and pyranometer" width="100" /><br>
Sunshine instruments     </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>5raingaugeandturfwall.jpg"><img src="<?=$metadata?>/ty_5raingaugeandturfwall.jpg" title="Turf wall with 5 inch rain gauge and tipping bucket" width="100" /><br>
5" rain gauge within turf wall    </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>new thousand acre gauge 23-03-2011.jpg"><img src="<?=$metadata?>/ty_new-thousand-acre-gauge.jpg" title="1/1000th acre rain gauge" width="100" /><br>
1/1000th acre rain gauge    </a>
</div>
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>Soildrains.jpg"><img src="<?=$metadata?>/ty_Soildrains.jpg" title="Rothamsted 20, 40 and 60 inch drain gauges" width="100" /><br>
Drain gauges  </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>Raingaugebelow40.jpg"><img src="<?=$metadata?>/ty_raingaugebelow40.jpg" title="Tipping bucket gauge below 40 inch drain" width="100" /><br>
Below 40 inch drain gauge      <a>
</div>


</div>
