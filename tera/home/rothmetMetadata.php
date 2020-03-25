<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<title>Rothamsted Site Meteorological Metadata</title>
<body onLoad="MM_preloadImages('Images/Park Grass.png.PNG')">
<h1>Rothamsted Site Meteorological Metadata</h1>

<p>Summary metadata for Rothamsted. All figures are based on the ROTHMET dataset available from the e-RA Data Extraction Tool.</p>

<p><a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="out"><img style="width:50px;"  alt="Creative Commons License"  
src="includes/cc4.png" align="middle" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>
<ul>
<li><A href="<?php echo $request; ?>#SEC1">Temperature</A> </li>
<li><A href="<?php echo $request; ?>#SEC2">Precipitation</A> </li>
<li><A href="<?php echo $request; ?>#SEC3">Wind</A> </li>
<li><A href="<?php echo $request; ?>#SEC4">Sunshine</A> </li>
<li><A href="<?php echo $request; ?>#SEC5">Total Radiation</A></li>
<li><A href="<?php echo $request; ?>#SEC6">Relative humidity</A> </li>
</ul>

<A id="SEC1"></a>
<h2>Temperature:</h2>
<h3>Average temperature for 1986 to 2015 showing minimum and maximum and long-term averages</h3>
<div id="tempPlotDiv" style="width: 95%; height: 500px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
	Plotly.d3.csv("http://local-info.rothamsted.ac.uk/eRA/tera/home/rothmetTempData.csv", function(err,allRows){ 
	
  var xtemp = [], y30min = [], y30max = [], y30av = [], yallmin = [], yallmax = [], yallav = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    xtemp.push( row['Month'] );
    y30min.push( row['30yrmin'] );
	y30max.push(row['30yrmax']);
	y30av.push(row['30yrav']);
	yallmin.push(row['allmin']);
	yallmax.push(row['allmax']);
	yallav.push(row['allav']);
  }
  
  var plotDiv = document.getElementById("tempPlotDiv");
  var traces = [{
    x: xtemp,
    y: y30min,	
	name: '1986-2015 minimum',
	type: 'scatter',
	line: {
		color: '#b3d9ff',
		dash: 'solid'
	}
  },
  {
	x: xtemp,
    y: y30max,	
	name: '1986-2015 maximum',
	type: 'scatter',
	line: {
		color: '#ff0000',
		dash: 'solid'
	}
  },
  {
	x: xtemp,
    y: yallmin,	
	name: 'long-term minimum',
	type: 'scatter',
	line: {
		color: '#b3d9ff',
		dash: 'dash'
	}
  },
  {
	x: xtemp,
    y: yallmax,	
	name: 'long-term maximum',
	type: 'scatter', 
	line: {
		color: '#ff0000',
		dash: 'dash'
	}
  },
  {
	x: xtemp,
    y: y30av,	
	name: '1986-2015 average',
	type: 'bar',
	marker: {
		color: '#0059b3'
	}
  },
  {
	x: xtemp,
    y: yallav,	
	name: 'long-term average',
	type: 'scatter', 
	line: {
		color: '#ff9900',
		dash: 'solid'
	}
  }
  ];
  var layout = {
	yaxis: {title:'degrees Celsius'}
  }
  Plotly.newPlot('tempPlotDiv', traces, layout);
});  
</script>

<A id="SEC2"></a>
<h2>Precipitation:</h2>
<h3>Average monthly rainfall for 1986 to 2015 and long term average (1878-2016)</h3>
<div id="rainPlotDiv" style="width: 95%; height: 500px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
	function makeplot() {
		Plotly.d3.csv("http://local-info.rothamsted.ac.uk/eRA/tera/home/rothmetRainData.csv", function(data){ processData(data) } );
	};
	
	function processData(allRows) {

  console.log(allRows);
  var x = [], y30 = [],  yall = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    x.push( row['Month'] );
    y30.push( row['1986-2015'] );
	yall.push( row['Long term average 1878-2016'] );
  }
  makePlotly( x, y30, yall);
}

function makePlotly( x, y30, yall){
  var plotDiv = document.getElementById("rainPlotDiv");
  var traces = [{
    x: x,
    y: y30,	
	name: '1986-2015',
	type: 'bar'
  },
  {
	x: x,
	y: yall,
	name:'Long term average 1878-2016',
	type: 'scatter'
  }
  ];
  var layout = {
	yaxis: {title:'mm'}
  }
  Plotly.newPlot('rainPlotDiv', traces, layout);
};
  makeplot();
  
  </script>

<A id="SEC3"></a>
<h2>Wind:</h2>
<h3>Wind distribution for 1986-2015 showing number of days recorded and windspeed</h3>
<div id="windPlotDiv" style="width: 95%; height: 500px;"><!-- Plotly chart will be drawn inside this DIV --></div>
<script>
	Plotly.d3.csv("http://local-info.rothamsted.ac.uk/eRA/tera/home/rothmetWindData.csv", function(err,allRows){ 
	
  var r1 = [], r2 = [], r3 = [], t = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    r1.push( row['<5 m/s'] );
	r2.push( row['5-10 m/s'] );
	r3.push( row['>10 m/s'] );
    t.push(row['compass_point']);
  }
  
  var plotDiv = document.getElementById("tempPlotDiv");
  var traces = [
  {
    r: r1,
    t: t,	
	name: '<5 m/s',
	marker: {color: '#00cccc'},
	type: 'area'
  }
  ,
  {
    r: r2,
    t: t,	
	name: '5-10 m/s',
	marker: {color: '#0099cc'},
	type: 'area'
  },
  {
    r: r3,
    t: t,	
	name: '>10 m/s',
	marker: {color: '#0033cc'},
	type: 'area'
  }
  ];
  var layout = {
	orientation: 270,
	autosize: 'T',
	radialaxis:{range:[0,1300]},
	barmode:'stack'
  }
  Plotly.newPlot('windPlotDiv', traces, layout);
});  
</script>

<A id="SEC4"></a>
<h2>Sunshine:</h2>
<h3>Average monthly sun hours per for 1986 to 2015 showing minimum and maximum</h3>
<div id="sunPlotDiv" style="width: 95%; height: 500px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
	Plotly.d3.csv("http://local-info.rothamsted.ac.uk/eRA/tera/home/rothmetMonthMeansData.csv", function(err,allRows){ 
	
  var x = [], y30tot = [], y30min = [], y30max = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
	console.log(row);
    x.push(row['month_name'] );
    y30tot.push(row['avg_sun_tot']);
	y30min.push(row['avg_sun_min']);
	y30max.push(row['avg_sun_max']);
  }
  
  var plotDiv = document.getElementById("sunPlotDiv");
  var traces = [{
    x: x,
    y: y30min,	
	name: '1986-2015 minimum',
	type: 'scatter',
	line: {
		color: '#b3d9ff',
		dash: 'solid'
	}
  },
  {
	x: x,
    y: y30max,	
	name: '1986-2015 maximum',
	type: 'scatter',
	line: {
		color: '#ff0000',
		dash: 'solid'
	}
  },
  {
	x: x,
    y: y30tot,	
	name: '1986-2015 average',
	type: 'bar',
	marker: {
		color: '#0059b3'
	}
  }
  ];
  var layout = {
	yaxis: {title:'hours'}
  }
  Plotly.newPlot('sunPlotDiv', traces, layout);
 });
</script>
<P><A id="SEC5"></a> </p>
<h2>Total Radiation:</h2>
<h3>Average total monthly radiation j/cm2 for 1986 to 2015 showing minimum and maximum</h3>
<div id="radPlotDiv" style="width: 95%; height: 500px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
	Plotly.d3.csv("http://local-info.rothamsted.ac.uk/eRA/tera/home/rothmetMonthMeansData.csv", function(err,allRows){ 
	
  var x = [], y30tot = [], y30min = [], y30max = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    x.push(row['month_name'] );
    y30tot.push(row['avg_rad_tot']);
	y30min.push(row['avg_rad_min']);
	y30max.push(row['avg_rad_max']);
  }
  
  var plotDiv = document.getElementById("radPlotDiv");
  var traces = [{
    x: x,
    y: y30min,	
	name: '1986-2015 minimum',
	type: 'scatter',
	line: {
		color: '#b3d9ff',
		dash: 'solid'
	}
  },
  {
	x: x,
    y: y30max,	
	name: '1986-2015 maximum',
	type: 'scatter',
	line: {
		color: '#ff0000',
		dash: 'solid'
	}
  },
  {
	x: x,
    y: y30tot,	
	name: '1986-2015 average',
	type: 'bar',
	marker: {
		color: '#0059b3'
	}
  }
  ];
  var layout = {
	yaxis: {title:'J/cm2'}
  }
  Plotly.newPlot('radPlotDiv', traces, layout);
 });
</script>
<A id="SEC6"></a>
<h2>Relative Humidity:</h2>
<h3>Average daily percentage relative humidity per month for 1986 to 2015 showing minimum and maximum</h3>
<div id="relhPlotDiv" style="width: 95%; height: 500px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
	Plotly.d3.csv("http://local-info.rothamsted.ac.uk/eRA/tera/home/rothmetMonthMeansData.csv", function(err,allRows){ 
	
  var x = [], y30tot = [], y30min = [], y30max = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    x.push(row['month_name'] );
    y30tot.push(row['avg_relh_avg']);
	y30min.push(row['avg_relh_min']);
	y30max.push(row['avg_relh_max']);
  }
  
  var plotDiv = document.getElementById("relhPlotDiv");
  var traces = [{
    x: x,
    y: y30min,	
	name: '1986-2015 minimum',
	type: 'scatter',
	line: {
		color: '#b3d9ff',
		dash: 'solid'
	}
  },
  {
	x: x,
    y: y30max,	
	name: '1986-2015 maximum',
	type: 'scatter',
	line: {
		color: '#ff0000',
		dash: 'solid'
	}
  },
  {
	x: x,
    y: y30tot,	
	name: '1986-2015 average',
	type: 'bar',
	marker: {
		color: '#0059b3'
	}
  }
  ];
  var layout = {
	yaxis: {title:'%'}
  }
  Plotly.newPlot('relhPlotDiv', traces, layout);
 });
</script>
<p><a href="<?php echo $request; ?>#top">Back to top</a></p>
<p> <A id="pixies"></a>
<div id="pixies">
