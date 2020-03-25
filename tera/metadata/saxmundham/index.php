<?php
/*
 * In this page, we have a nice use of the function to get the keyrefs (or any keyword related references):
 * use:
 *
 * $KeyRef = "KeyRefSAX" ;
 *
 * GetKeyRefs2 ($KeyRef);
 *
 * At the end of the page, please use unset ($KeyRef) to avoid listing another set of references at the end of the page.
 */
$KeyRef = "KeyRefSax";

?>
<h1>Saxmundham Experimental Farm</h1>

<p>Saxmundham Experimental Station is in East Suffolk, five miles (8 km) from the sea and 110 miles (177 km) East of Rothamsted.
The soil is a heavy sandy clay loam which can be difficult to cultivate, providing a contrast with the soils at Rothamsted and Woburn. 
Two long-term experiments were started in 1899 by East Suffolk County Council. Rothamsted assumed responsibility for the site in 1965
and the experiments were reviewed and modified. Rothamsted relinquished the site in 2010. </p>


<table>
	<tr>
		<th><b>Experiment</b></th>
		<th><b>Code</b></th>
		<th><b>Experimental Objectives</b></th>
		<th><b>Year started</b></th>
	</tr>

		<tr>
		<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC9">Rotation I</a></td>
		 		<td>S/RN/1</td>
		<td>Crop responses to P and K and their interactions with N  </td>
		<td>1965</td>
	</tr>
	<tr>
		<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC10">Rotation II</a></td>
		<td>S/RN/2</td>
		<td>The response of various crops to fresh and residual P   </td>
		<td>1965</td>
	
</table>

<h2>Background</h2>
<p>In 1899 two long-term experiments, Rotation I and Rotaion II, were started at Saxmundham by the Education Committee of the East Suffolk County Council. 
Each consisted of four blocks so that a typical Norfolk four-course rotation could be grown, with each crop present each year.
NAAS (now ADAS) managed the site from 1947 until 1963, and when ARC (later AFRC, now BBSRC) acquired the lease in 1964,
Rothamsted assumed responsibility for managing the experimental programme, and the experiments were reviewed and modified. 
The reasons why the experiments were established, and early results are given by Oldershaw (1941). </p>

<p>


</p>
<ul>
<li><A href="<?php echo $request; ?>#SEC1">Site details:</A> information about the site and soil </li>
<li><A href="<?php echo $request; ?>#SEC2">Experimental plans:</A> Maps and plans of the field layout </li>
<li><a href="http://www.era.rothamsted.ac.uk/Met/SaxMet1966"  target="_blank">Meteorological data measured at Saxmundham</a></li>
<li><A href="<?php echo $request; ?>#SEC3">Rotation I:</A> information about the experiment </li>
<li><A href="<?php echo $request; ?>#SEC4">Rotation II:</A> information about the experiment </li>
<li class="nicelist"><A href="<?php echo $request; ?>#papers">Key References</A> related to Saxmundham</li>

</ul>

<A NAME="SEC1"></a>
<h2>Site details</h2>


<p><b>Location:</b><p/>
<p class="center">
<table class="center">
<tr>
<th class="border" > <b> Site </b></th>
<th class="border" > <b> Location</b> </th>
<th class="border" ><b> Latitude</b></th>
<th class="border" ><b>Longitude</b></th>
<th class="border" ><b>Altitude (m asl)</b></th>
</tr>
<tr>
<td class="border" >Saxmundham Experimental Station</td>
<td class="border" >Saxmundham, Suffolk</td>
<td class="border" > 52.22 N</td>
<td class="border" > 1.47 E</td>
<td class="border" > 37 </td>
</tr>
</table>
</p>
<p>Average annual temperature and rainfall (1966-1985) are 9.5 ºC and 618mm respectively.
See  <a href="http://www.era.rothamsted.ac.uk/Met/SaxMet1966"  target="_blank"> Saxmundham monthly meteorological summaries, 1966-85 </a> for more details. </p>
<P> See Goulding et al (1986) for details of <b>atmospheric deposition</b> at Saxmundham, 1969-1984.</P>
 <p><b>Soil description:</b><p/>
<li>International Classification: Eutric Gleysol (IUSS Working Group WRB, 2015)</li>
<li>Sandy clay loam developed in drift over Chalky Boulder Clay (Hodge, 1972) </li>
<li>Soil Survey of England & Wales Series: Beccles Series (Corbett & Tatler, 1970) </li>

<p>For more details of the Beccles and other soil series, see  
<a href="http://www.landis.org.uk/services/soilsguide/series_list.cfm" target="_blank"> Cranfield University 2018 Soils Guide.</a>  </p>
<p>The soil is typical of large areas of Eastern England. The field is drained (Williams, 1971) but the soil can be difficult to manage
when weather conditions are unfavourable (Cooke & Williams, 1972). </p>







<A NAME="SEC2"></a>
<h2>Experimental plans</h2>

<p>
	<UL>
<LI class="nicelist"><a href="<?php echo $metadata ; ?>SaxIIPlan1969-86.pdf" target="_blank">Rotation II experimental plan</A> </li>
	              		</ul>
	              	</p>


<A NAME="SEC3"></a>
<h2>Rotation I</h2>

<p>Rotation I experiment was a factorial test of N, P and K plus bone meal and FYM treatments (Trist and Boyd, 1966; Williams & Cooke, 1971).
Since 1965 the experiment has been used to look at crop responses to P and K and their interactions with N, particularly with high rates of N 
applied to high yielding wheat cultivars for bread-making quality.  See Goulding and Talibudeen (1984) and Johnston (1987) below for more details. </p>


<A NAME="SEC4"></a>
<h2>Rotation II</h2>
<p>Rotation II experiment looked at how limited amounts of FYM, sodium nitrate and superphosphate could best be used over the four-course rotation. Since 1965 the experiment 
has been used to look at the response of various crops to fresh and residual P (Johnston et al, 2013) and the decline in plant-available P when fertilizer P was withheld (Johnston et al, 2016).
The critical level, above which there is no further response to fresh P, is higher and more variable on this heavier soil than on the better soil at Rothamsted 
(see <a	href="http://www.era.rothamsted.ac.uk/Exhaustion" target="_blank">Exhaustion Land</A>).    </p>

<p><b>1899-1964.</b></p>
<p>The experiment originally consisted of four large blocks each comprising 10 treatment strips. The objective of the experiment was to determine how farmyard manure (FYM) and/or 
inorganic fertilizer (nitrogen (N) and phosphorus (P)) could best be distributed to crops in a four-course rotation. The treatments were applied once every 4th year. In 1952,
two-thirds of the experiment was stopped, although one strip on two of the blocks was re-incorporated into the experiment later (see below). Results for this period are given by Oldershaw (1941)
and Boyd & Trist (1966).  </p>

<p><b>1965-1968.</b></p>
 <p>When Rothamsted took over the management of the site in 1964 it was decided to modify the experiment. The FYM and P fertilizers which had been applied to strips 1-7 had resulted in a range of
 phosphate residues in the soil. Additional FYM and P was applied to some strips to extend the range of P residues prior to testing the value of fresh and residual P on sub-plots within the main 
 treatment strips. Strip 8, which had not received any treatment since 1952 was re-incorporated into the experiment. The amounts of FYM and P fertilizer applied between 1899-1964 and 1965-1968
 are given in <a href="<?php echo $metadata ; ?>SaxIIPlan1969-86.pdf" target="_blank">Rotation II experimental plan</A> and the effect that these, and 
 earlier, treatments had on plant-available P (Olsen P) was given by Mattingly, Johnston & Chater (1970). </p>

 <p><b>1969-1986.</b></p>
 <p>The purpose of the revised experiment was to investigate the effects of soil P and fresh fertilizer P on the yields of arable crops at a range of soil P values (Johnston et al. 1986). 
 Following the previous treatments, a wide range of Olsen P values (4-65 mg P/kg) had been established. In 1969, the eight strips were divided into four blocks (A, B, C & D) each separated 
 by a headland and with each strip in each block comprising five micro-plots (each 5.49 x 3.56 m). Cropping and treatments to the micro-plots were phased-in,
 with Blocks A and B starting in 1969 and Blocks C and D the following year; 
 see the <a href="<?php echo $metadata ; ?>SaxIIPlan1969-86.pdf" target="_blank">Rotation II experimental plan</A> showing the treatments applied to each plot, previous treatments and the cropping. </p>

 <P>On each set of micro-plots within each Strip/Block, five amounts of P fertilizer were tested, P0, P0, P1, P2, P3 (0, 0, 27.4, 54.8, 82.2 kg P/ha). These were applied every second year (see '(a)' on plan). 
 Between 1973-1975 on Blocks A & B (1974-1976 on blocks C & D) one of the P0 micro-plots remained as P0, two micro-plots received a total of 82.2 kg P/ha as 3 annual dressings each of 27.4 kg P/ha and 
 two micro-plots received a total of 82.2 kg P/ha as one dressing only in 1973 (or 1974) (see '(b)' on plan).
 From autumn 1977 (or 1978) a 'maintenance' dressing of 52.4 kg P/ha was applied every second year to two of the micro-plots; no P was applied to the others (see 'c' on the plan).  </p>
 
 <P>Some microplots received no further applications of manure or fertilizer P after 1968 by which time a wide range of Olsen P values had been established. The decline in Olsen P in each of the eight main
 treatment strips was measured and, by shifting the eight decay curves horizontally, a common decay curve could be fitted to the data (Johnston et al., 1986). The half-life, i.e. the time taken for Olsen P 
 to decline by half from any given value to an asymptote (the lowest Olsen P value measured on the experiment), could be calculated (Johnston et al., 2016 and other papers). Data from the Rotation II experiment 
 at Saxmundham has been included in a paper published in a special issue of the Journal of Environmental Quality to mark the 350th Anniversary of the discovery of phosphorus (Johnston & Poulton, 2019).  See Key References below.   </p>
 
 <p><b>Crop and soil measurements:</b></p>
 <p>The annual yields of all crops (except field beans) were measured and crop samples (grain, straw, tubers, sugar beet) retained and analysed for percentage N, P, K, Ca, Mg and Na.  P offtakes have been calculated.  <P>

 <p> Yields of potatoes, sugar from sugar beet, barley and wheat, and their response to fresh and residual P are discussed by Johnston at al. (1986) for the period 1969-1977.
 The response to fresh and residual P for later crops of barley and wheat (1978-1986) are discussed in Johnston et al. (2013). Data for the response by all the spring barley and winter wheat crops
 to Olsen P was also discussed in an HGCA Review by Johnston & Poulton (2011). See Key References below.</p>

 <p><b>Soil</b> from Blocks A & B was sampled every other year in spring from 1969-1983, and from C & D every other year from 1970-1984. The soils were sampled with a 2.5 cm diameter semi-cylindrical auger,
 bulking c. 12-15 cores per micro-plot. The soils were air-dried, ground < 2 mm and analysed for plant-available P (Olsen, 1954). Olsen P data, as both concentration and amount (using a measured soil weight), 
 is available.  Some soils were also analysed for exchangeable cations and pH. Organic C and Total N were measured on more finely ground sub-samples.    </p>
 
 <P><b>15-N experiments: </b> Nitrogen (N) fertilizer labelled with the heavy isotope <sup>15</sup></sup>N was applied to some of the winter wheat plots in the early 1980s, to determine the recovery of fertilizer N in the crop and soil. 
 See Powlson et al (1992) for the recovery of fertilizer N applied in the autumn; Hart et al (1993) for the fate of the residues; Macdonald et al (1989) for the recovery of unused fertilizer N in the soil. The data was also used 
to partition losses between denitrification and leaching (Addiscott & Powlson, 1992) and to model the fate of N in crop and soil (Bradbury et al, 1993). All these references are in the <A href="<?php echo $request; ?>#papers">Key References</A>  section below.   
 </P>

 <P><b>Data available:   </b>
 <ul>
<li><a href="<?php echo $metadata ; ?>SaxIIPlan1969-86.pdf" target="_blank">Rotation II experimental plan and cropping sequence</A>
<li>Amounts of fertilizer N applied to the crops 1969-1986 </li>
<li><a href="http://www.era.rothamsted.ac.uk/Met/SaxMet1966"  target="_blank">Monthly summaries of meteorological data, 1966-1985.</a></li>
<li>Yields of spring barley, grain and straw (1970-1979), potato tubers (1969-1974), sugar from sugar beet (1969-1974), winter wheat, grain and straw (1977-1986). </li>
<li>P uptake by spring barley, grain and straw (1970-1979), potato tubers (1969-1974), sugar from sugar beet (1969-1974), winter wheat, grain and straw (1977-1986).
P uptake by beans in 1980, 1981, 1984, 1985 are estimated   </li>
<li>Olsen P in soil, 0-23 cm, 1969-1984 </li>
<li>Total C, Total N and pH in soil, 0-23 cm; selected years</li>

</ul>


<p>For more details of what data is available and how to access it, please contact the <a href="<?=$Era_Curator[Email]?>" target="_blank"> e-RA Curators</a>.  </p>
<P><B>Author:</b> Paul Poulton, September 2019.
<p><b>Acknowledgments:</b> We thank the many staff who were responsible for managing the experiment (G W Cooke, A E Johnston, G E G Mattingly, V C Woolnough B.E.M.),
sampling and sample handling (P A Cundill, M V Hewitt), chemical analysis (W S Gregory, B Messer, R P Skilton), statistical analysis (A D Todd, P W Lane, R P White) 
and making the data available through the e-RA website (N I D Castells-Brooke, M J Glendining, R J Ostler, S A M Perryman). 
We also thank the Lawes Agricultural Trust, Rothamsted Research and BBSRC for their support.  </P>

<p><?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>


</div>
<a name="pixies"></a>
<div class="col-2">


    
<?php
// This ensures that there are no more keyrefs listed after that: Otherwise, the script will continue and list the last set of references.

unset ( $KeyRef );
?>
<!--           that is an example of pixy
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>name.gif"><img src="<?php echo $metadata ; ?>/ty-name.gif" title="1865" width="100" /><br>
Legend  </a>
</div>
</div>
-->
