<?php
$KeyRef = "KeyRefDerivedVars"; PINK

?>


<h1>Derived meteorological variables</h1>



<p>The following variables are derived on extraction from e-RA:</p>


<p></p>

<ul>

<LI class="nicelist"><A href="<?php echo $request; ?>#DDA"><B>DDA</B></A>:	Day Degrees Above a base temperature (TLIM) (�C)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#DDB"><B>DDB</B></A>:	Day Degrees Below a base TLIM	(�C)</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#ACDDA"><B>ACCDDA</B></A>:	Accumulated Day Degrees Above TLIM	(�C)</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#ACDDB"><B>ACCDDB</B></A>:	Accumulated Day Degrees Below TLIM	(�C)</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#SMD"><B>SMD</B></A>:	Potential Soil Moisture Deficit (mm)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#PSMD"><B>PSMD</B></A>:	Accumulated Potential Soil Moisture Deficit (mm)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#RELH"><B>RELH</B></A>:	Relative humidity at 0900 GMT (% value of saturation value)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#EVAPG"><B>EVAPG</B></A>:	Evaporation over Grass (mm)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#EVAPW"><B>EVAPW</B></A>:	Evaporation over Water (mm)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#VAP"><B>VAP</B></A>:	Vapour pressure (mb)	</li>

</ul>

<p>The following variables can be calculated if values are missing:</p>
<ul>

<LI class="nicelist"><A href="<?php echo $request; ?>#WINDRUN"><B>WINDRUN</A>:</B>	Run of wind in 24h, 0900GMT to 0900GMT (km/24 hours)</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#DEWP"><B>DEWP</A>:</B>	Dew point (�C)</li>	
<LI class="nicelist"><A href="<?php echo $request; ?>#RAD"><B>RAD</A>:</B>	Radiation (J/m<sup>2</sup> or MJ/m<sup>2</sup> or J/cm<sup>2</sup>) </li>
</ul>

<p>Other definitions:</p>
<ul>

<LI class="nicelist"><A href="<?php echo $request; ?>#AVTEMP"><B>AVTEMP</A>:</B>	Average temperature (�C)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#TRANGE"><B>TRANGE</A>:</B>	Temperature range (�C)	</li>
<LI class="nicelist"><B>TMIN:</B>	Daily minimum temperature (�C)	</li>
<LI class="nicelist"><B>TMAX:</B>	Daily maximum temperature (�C)	</li>
<LI class="nicelist"><A href="<?php echo $request; ?>#TLIM"><B>TLIM</A>:</B>	The (arbitrary) limiting or base temperature (set by user) (�C)	</li>
<LI class="nicelist"><B>WETB:</B>	Wet bulb temperature (�C)	</li>
<LI class="nicelist"><B>DRYB:</B>	Dry bulb temperature (�C)	</li>
<LI class="nicelist"><B>WINDSP:</B>	Wind speed at 0900GMT (m/s)	</li>
<LI class="nicelist"><B>RAIN:</B>	Rainfall in 24h, 0900GMT to 0900GMT (mm)	</li>
<LI class="nicelist"><B>RDUR:</B>	Rainfall duration, 0900GMT to 0900GMT  (h)	</li>
<LI class="nicelist"><B>SUN:</B>	Hours of sunshine (h)</li>
</ul>
	


<p><B>1) Calculation of Temperature derived Items:</B></p>
<a name="TRANGE"></a>

<p>TRANGE = TMAX - TMIN   : Range (�C) </p>

<a name="AVTEMP"></a>
<p>AVTEMP = (TMAX+TMIN)/2 : Average temperature (�C) </p>

<a name="TLIM"></a>
<a name="DDA"></a>

<p><B>Calculation of DDA Day Degrees Above a base temperature (TLIM) </B></p>

<p>If TMIN >= TLIM then <B>DDA</B> = AVTEMP - TLIM  </p>
<p>If TMAX< = TLIM then <B>DDA</B> = 0 </p>
<p>If (TMAX - TLIM) >= (TLIM - TMIN) then <B>DDA</B> = (TMAX - TLIM)/2 - (TLIM - TMIN)/4 </p>
<p>If none of the above then <B>DDA</B> = (TMAX - TLIM)/4  </p>


<a name="DDB"></a>


<p><B>Calculation of DDB Day Degrees Below a base temperature (TLIM)  </B></p>

<p>If TMIN > = TLIM then <B>DDB</B> = 0 in (�C)</p>
<p>If TMAX <= TLIM then <B>DDB</B> = TLIM - AVTEMP </p>
<p>If (TMAX - TLIM) >= (TLIM - TMIN) then <B>DDB</B> = (TLIM - TMIN)/4</p>
<p>If none of these then <B>DDB</B> = (TLIM - TMIN)/2 - (TMAX - TLIM)/4</p>

<a name="ACDDA"></a>
<a name="ACDDB"></a>
<p><B>ACCDDA & ACCDDB</B></p>

<p>Accumulated day degree data: this is a running total, and an arbitrary start date has to be provided. </p>

<p><B>Note:</B> these calculations are provided from the standard found in the Energy Efficiency Office (1985).</p>

<a name="WINDRUN"></a>

<p>2) <b>Calculation of wind run (WINDRUN)</B> </p>
<p> WINDRUN is usually measured so this is only to be used if the data is missing. </p>

<p><B>WINDRUN</B> = WINDSP * 86.4  (this is conversion from m/s to km/24 hours).</p>

<p><b>3) Calculation of actual Vapour pressure (VAP), Dewpoint (DEWP) and saturated vapour pressure (SVAP)</b></p>
<p>At <B>Rothamsted</b> these are calculated within the datalogger after Buck (1981) and Allen et al (2006). </p>
<p>At <B>Woburn</b> these are have been calculated within the datalogger since the station was automated in 1999 as described by Campbell Scientific Technical Note 16 (2005), using formulae based on studies by Lowe (1977). Before automation, the assumption is that the equations of Buck (1981) werre used alongside those of the Met Office (1964) and Allen et al (2006), as shown below for Rothamsted. </p>



<a name="VAP"></a>
<p><B> Calculation of actual vapour pressure (VAP):</B></p>

<p>At <b>Rothamsted</b> this is after Buck (1981) and Allen et al, (2006): </p>

<p>If WETB > 0, <B>VAP</B>= 6.1375*EXP(17.502*WETB/(240.97+WETB))-0.799*(DRYB-WETB) </p>

<p>If WETB <=0, <B>VAP</B>=6.1389*EXP(22.452*WETB/(272.55+WETB))-0.720*(DRYB-WETB) </p>

<p> At <b>Woburn VAP</B> has been calculated within the datalogger from Relative Humidity (RELH) and DRYB only since 
Dec 2009, based on Campbell Scientific Technical Note 16 (2005) and Lowe (1977):</p>

<p>SVAP=6.107799961+DRYB*(4.436518521*10<sup>-1</sup>+DRYB*(1.428945805*10<sup>-2</sup>+DRYB*(2.650648471*10<sup>-4</sup>+DRYB*(3.031240396*10<sup>-6</sup>+DRYB*(2.034080948*10<sup>-8</sup>+6.136820929*10<sup>-11</sup>*DRYB))))) </p>
<p>VAP = RELH * SVAP/100 </p>
<p>SVAP = Saturated vapour pressure for the air temperature range of -50�C to +50�C </p>

<a name="DEWP"></a>
<p><B>Calculation of dew point (DEWP) </B></p>
<p> At <b>Rothamsted</b> this is calculated after Buck (1981): </p>
<p><B>DEWP</B>= 240.97*LOG<sub>n</sub>  (VAP/6.1375)/(17.502-LOG<sub>n</sub>(VAP/6.1375))</p>

<P>At <B>Woburn</b>, DEWP has been calculated within the datalogger from DRYB and WETB and RELH after Lowe (1977). 
<a name="RELH"></a>

<a name="RELH"></a>
<p><B>Calculation of Relative Humidity, RELH</B> </p>

<p>SVAP = Saturated vapour pressure</p>
<p>VAP = Actual vapour pressure (see above)</p>
<p>SVAP = 6.1375*EXP(17.502*DRYB/(240.97+DRYB))  (Buck, 1981)</p>
<p>RELH = 100 * (VAP/SVAP)</p>




<p><B>4) Definitions and intermediate calculations for RAD, EVAPG, EVAPW and PSMD</B></p>


<p>Cos, sin and tan have the usual trigonometric meanings</p>
<p>Sqrt the square root function</p>
<p>nday_val is the day number (Julian date) of the record in question e.g. 1st Feb. = 32</p>
<p>days_in_year ordinarily is 365, but 366 in a leap year</p>
<p>stn_latitude is the latitude of the station in question: Rothamsted = 51.81�N
<p>Woburn =  52.017 �N Brooms Barn = 52.267 �N.</p>
<p>hrday is the maximum amount of sunshine in hours, that a latitude can receive. (i.e. cloudless all day)</p>
<p>sunfr is the sun fraction, the ratio of recorded hours of sun to the maximum possible</p>
<p>HMM is the evaporation term from net radiation over grass</p>
<p>EA_GRASS is the evaporation term from humidity differences over grass</p>
<p>EA_WATER is the evaporation term from humidity differences over water</p>
<p>angnd = (6.28318 *(nday_val - days_in_year + 193))/days_in_year</p>
<p>csd = cos(angnd)</p>
<p>snd = sin(angnd)</p>
<p>cs2d = (csd + snd)*(csd - snd)</p>
<p>sn2d = 2*csd*snd</p>
<p>sndecl = 0.00678 + (0.39762*csd)+(0.00613*snd)-(0.00661*cs2d)-(0.00159*sn2d)</p>
<p>csdecl = sqrt(1 - sndecl*sndecl)</p>
<p>csl = cos((stn_latitude*3.14159)/180)</p>
<p>snl = sin((stn_latitude*3.14159)/180)</p>
<p>cshass = (-0.014544 - (snl*sndecl))/(csl*csdecl)</p>
<p>snhass = sqrt(1 - cshass*cshass)</p> 
<p>hass = atan(snhass/cshass) if hass < 0 then hass = hass + 3.14159</p> 
<p>hrday = hass*24/3.14159</p>
<p>sunfr = SUN/ hrday</p>
 


<p><B>Evaporation Items</B></p>


<p>Exp is the exponential function (e<sup>x</sup>)</p>
<p>** is the exponentiation function (x<sup>n</sup>)</p>
<p>d0g is a correction factor for grass: 0.75</p>
<p>d1g is a correction factor for grass: 1</p>
<p>d0w is a correction factor for water: 0.95</p>
<p>d1w is a correction factor for water: 0.5</p>
<p>c1 is a constant: 4.0621 * 10<sup>-7</sup></p>
<p>c2 is a constant: 3.721432778 x 10<sup>7</sup></p> 
<p>The relative humidity (RELH) expresses the degree of saturation of the air as a ratio of the actual
(VAP) to the saturation (Es) Vapour pressure at the same temperature (from Allen et al, 2006) </p>

<p>Es = 6.1078 * exp((17.269 * AVTEMP) / avt)  (Es = saturated vapour pressure at Avtemp) Note that these 
values are not exactly the same as for SVAP.  </p>


<p>avt = AVTEMP + 237.3 </p> 
<p>Es = 6.1078 * exp((17.269 * AVTEMP) / avt)  (Es = saturated vapour pressure at Avtemp)</p>
<p>delta = (4097.93 * Es) / (avt * avt)</p>
<p>sunfr = SUN/ hrday</p>
<p>fnt2 = (0.0048985 * (AVTEMP + 273.0) ** 4) *(0.47- (0.065 * sqrt(VAP))) * (0.17 + 0.83 * sunfr)</p>
<p> ev1 = c1 * delta</p>



<a name="RAD"></a>

<p><B>5) Calculation of Radiation (RAD)</B> (only to be used if data is missing)</p>


<p>inv = 1.00011 - (0.03258*csd)-(0.00755*snd)+(0.00064*cs2d)+(0.00034*sn2d)</p>

<p><B>RAD</B> = (0.16+(0.62*(((SUN)/hrday))))*c2*inv*((csl*csdecl*snhass) + (snl*sndecl*hass))</p>

<p>NB: The calculated value for radiation should be divided by 1,000,000 to express MJ rather than joules
of energy.</p>

<a name="EVAPG"></a>
<p><B>6) Calculation of Evaporation  over grass (EVAPG)</B></p>


<p>EA_GRASS = 0.2625 * ((6.1078 * exp((17.269 * AVTEMP)/(237.3 + AVTEMP)) - (VAP)* 
(d1g + (WINDRUN* .0062137)))</p> 


<p>if EA_GRASS < 0 then EA_GRASS = 0</p>

<p>hj_g = d0g * (1000000 * RAD) - fnt2</p>

<p><B>EVAPG</B> = ( (hj_g * ev1) + (0.66 * EA_GRASS )) / (delta + 0.66) </p>

<p>HMM = (hj_g * ev1)/ 0.66 </p>

<a name="EVAPW"></a>
<p><B>7) Calculation of Evaporation  over water (EVAPW)</B></p>


<p>EA_WATER = 0.2625 * ((6.1078 * exp((17.269 * AVTEMP)/(237.3 + AVTEMP)) -
(VAP)*(d1w + (WINDRUN * 0.0062137))) </p>

<p>if EA_WATER < 0 then EA_WATER = 0;</p>

<p>hj_w = d0w * (1000000 * RAD) fnt2</p>

<p><B>EVAPW</B> = ((hj_w * ev1) + (0.66 * EA_WATER )) / (delta +0.66)</p> 


<p>The calculation of EA, HMM, EVAPG and EVAPW are described in detail in Berry (1964).</p> 


<a name="SMD"></a>

<p><B>8) Calculation of Potential Soil Moisture Deficit (PSMD)</B></p>

<a name="APSMD"></a>
<p><B>PSMD = PSMD + EVAPG - RAIN (Not negative)</B></p>

<p>Where PSMD is the accumulated SMD so far. </p>


<p>PSMD is an accumulated value, starting at the value for soil moiture deficit for start of range.</p>

<p>This measures the loss of moisture in the soil; and while the daily value may be significant it is
usually calculated over some months at least. Technically it is an accumulation, and into the summer 
will usually show a net loss. The value can never be negative, as if precipitation exceeds evaporation
together with any deficit to date, this forms runoff and contributes to surface water flow.</p>


<p>Prepared by Margaret Glendining and Claudia Underwood, June 2010, with advice from Tony Scott. Updated December 2016 by Tony Scott. 
Based on the BITS Metdata Web Manual, extracted Oct 2009, and the old e-RA webpages, 1997.
For further details, contact the <a href= "mailto:era@rothamsted.ac.uk">e-RA Curators.</a></p>



