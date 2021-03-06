﻿<?php
$KeyRef = "KeyRefOARESmatemp" ;

?>
<title>Meteorological open access data</title>
<H1>Annual mean air temperature at Rothamsted</H1>
<p>Last updated 21/04/2017</p>

<p><A NAME="SEC1"></a></p>
<H2>Access Use and Conditions</H2>

<p>
<a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="out"><img style="width:50px;"  alt="Creative Commons License"
src="includes/cc4.png" align="middle" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>. </p>
<p><strong>YOU MUST CITE AS: </strong>Rothamsted Research (2017). Rothamsted mean long-term annual temperature. <em>Electronic Rothamsted Archive</em> <a href="https://doi.org/10.23637/KeyRefOARESmatemp" target="_blank" rel="noreferrer"><span xml:lang="EN-GB" lang="EN-GB">https://doi.org/10.23637/KeyRefOARESmatemp</span></a>.</p>
<P><b><a href="<?php echo $metadata ; ?>Mean annual temp fig.pdf"  target="_blank"><img src="<?php echo $metadata ; ?>long-termtemp.png" width="727" height="485" alt="Click to download chart Annual mean Rothamsted temperature" /></a></b>
  
  Click the chart above for a PDF version. Summary data used for this chart are derived from annual daily data measured at Rothamsted Meteorological Station and are available to download as an Excel Spreadsheet:
  <a href="<?php echo $metadata ; ?>Mean annual temp data.xlsx">Annual Mean Rothamsted Temperature</a>. </p>
<P>The original raw data is available, after registering, from the e-RA database. Please contact the <a href="mailto:era@rothamsted.ac.uk">e-RA Curators</a> for a password and further details.</p>
<h2>Description</h2>
<p>Rothamsted has  one of the longest running continuous sets of meteorological recordings in the world. The  figure shows the annual mean air temperature at Rothamsted every year from 1878-2013. Also shown is the mean over each five-year period, 1878-1882,  1883-1887, etc. The red line shows the mean temperature, 1878-1987. Mean annual  air temperature has fluctuated considerably between 1878-2013. However, when  the variation in annual temperature is smoothed using five-year means, it is  apparent that air temperatures have risen sharply since 1987 (Scott, 2015). The  mean air temperature at Rothamsted is now approximately 10.04&deg;C which is 1.1&deg;C higher than the 1878-1987 average. The 10 warmest years on record occurred  in the last 17 years. Much of the rise is due to increases in the autumn and  winter months, and in night time temperatures.</p>
<p><strong>MEASUREMENTS</strong></p>
<p>Daily temperature is measured over the 24 hour period 0900 to 0900 GMT. <br />
  Since first recorded in 1878, maximum temperature (TMAX) was measured using a mercury column thermometer and mimimum temperature (TMIN) using a spirit-in-glass with indicator bar minimum thermometer. <br />
Since 2004, temperatures have been recorded automatically by thermistors (electronic temperature probes, Campbell Scientific, Type 107). </p>
<H2>Keywords:</H2>
<a href="http://aims.fao.org/aos/agrovoc/c_4781" target="_blank">Meteorological  station</a><br /> 
<a href="http://aims.fao.org/aos/agrovoc/c_29564" target="_blank">Weather data </a><br />
<a href="http://aims.fao.org/aos/agrovoc/c_15292" target="_blank">Weather</a><br />
<a href="http://aims.fao.org/aos/agrovoc/c_7657" target="_blank">Temperature</a><br />
<a href="http://aims.fao.org/aos/agrovoc/c_230" target="_blank">Air temperature</a><br />
<a href="http://aims.fao.org/aos/agrovoc/c_7721" target="_blank">Thermometer</a><br />
<a href="http://aims.fao.org/aos/agrovoc/c_1665" target="_blank">Climate </a><br />
<a href="http://aims.fao.org/aos/agrovoc/c_1666" target="_blank">Climate change</a><br />
<br />
<h2>Further Information </h2>
<p>Updated from Scott (2015) see Key Reference below. For further information about the measurement of temperature at Rothamsted see <a href="Met/instrumentdescription"> 
Temperature</a>.<br /> Further details can be obtained from the e-RA curators, the <a href="http://dx.doi.org/10.23637/ROTHAMSTED-LONG-TERM-EXPERIMENTS-GUIDE-2006" target="_blank">Rothamsted Guide to the Classical 
Experiments (2006)</a>, pp 44-45, and the Key References below. <p>

<a href="<?php echo $request; ?>#top">Back to top</a></p>
</p>

  <a name="pixies"></a></p>

<!--
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Aerial pic 3.34.jpg"><img src="<?php echo $metadata ; ?>/ty_Aerial pic 3.34.jpg" title="Broadbalk aerial view" width="100" /><br>
Broadbalk aerial view   </a>
</div>
-->

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



</div>
<!--           that is an example of pixy
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>name.gif"><img src="<?php echo $metadata ; ?>/ty-name.gif" title="1865" width="100" /><br>
Legend  </a>
</div>
</div>
-->


